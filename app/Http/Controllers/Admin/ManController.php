<?php

namespace App\Http\Controllers\Admin;

use App\Models\Man;
use App\Models\Name;
use App\Models\Uruu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $man = Man::find(1);
        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $man = Man::find(1);
        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $man = Man::create([
            'name' => $request['name'],
            'father_id' => $request['father_id'],
            'level' => $request['level'] + 1,
            'uruusu' => $request['uruusu'],
            'kanchanchy_bala' => $request['kanchanchy_bala'] + 1,
            'created_by' => $request['created_by']
        ]);
        $father = Man::find($request->father_id);
        $father->update(['bala_sany' => $father->bala_sany + 1]);

        // Categories
        if ($request->input('categories')) :
            $man->categories()->attach($request->input('categories'));
        endif;

        // Image
        if ($request->file('photo') != null) {
            $man->image = $request->file('photo')->store('people-image', 'public');
            $man->save();
        }

        // Name
        $name = Name::where('name', $man->name)->get()->first();
        if ($name == null) {
            $number_of_name = Man::where('name', $man->name)->count();
            Name::create(['name' => $man->name, 'male_female' => 1, 'number_of_name' => $number_of_name]);
        }
        else {
            $name = Name::where('name', $man->name)->get()->first();
            $name->number_of_name++;
            $name->save();
        }

        // Forget the father's cache
        self::forgetManCache($man);

        return redirect()->route('admin.man.edit', $father);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function show(Man $man)
    {
        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function edit(Man $man)
    {
        if ($man->id == 1) {
            $id = 2;
            $father_id = 1;
        }
        else {
            $id = $man->id;
            $father_id = $man->father_id;
        }

        return view('admin.men.edit', [
            'active_man_id' => $man->id,
            'father' => Man::with(['children' => function ($query) {
                                $query->where('is_removed', '0')->orderBy('kanchanchy_bala');
                            },'kyzdary' => function ($query) {
                                $query->where('is_removed', '0')->orderBy('kanchanchy_kyz');
                            }])->where('is_removed', '0')->find($father_id),
            'man'    => Man::with(['children' => function ($query) {
                                $query->where('is_removed', '0')->orderBy('kanchanchy_bala');
                            },'kyzdary' => function ($query) {
                                $query->where('is_removed', '0')->orderBy('kanchanchy_kyz');
                            }])->where('is_removed', '0')->find($id),
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => '',
            'uruular' => Uruu::orderBy('name')->get(),
            'person' => $man
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Man $man)
    {
        if ($man->name !== $request['name']) {
            $name = Name::where('name', $man->name)->get()->first();
            $name->number_of_name--;
            $name->save();
        }

        $man->update($request->except('categories', 'photo', 'father_id'));

        // Changing the Father ID
        if ($man->father_id != $request['father_id']) {

            // Forget old father's cache
            self::forgetManCache($man);

            // Бир туугандарынын катарын өзгөртүү жана бала санын өзгөртүү
            $father = Man::find($man->father_id);
            for($i = 0; $i<$father->bala_sany - $man->kanchanchy_bala; $i++) {
                $father->children
                    ->where('kanchanchy_bala', $i + $man->kanchanchy_bala + 1)
                    ->first()
                    ->update(['kanchanchy_bala' => $i + $man->kanchanchy_bala]);
            }
            $father->update(['bala_sany' => $father->bala_sany - 1]);

            // Жаңы атасынын бала санын өзгөртүү
            $father = Man::find($request['father_id']);
            $father->update(['bala_sany' => $father->bala_sany + 1]);

            // Адамдын катарын жана атасынын IDсин өзгөртүү
            $man->update(['kanchanchy_bala' => $father->bala_sany,
                            'father_id' => $request['father_id']]);
        }

        //Categories
        $man->categories()->detach();
        if ($request->input('categories')) :
            $man->categories()->attach($request->input('categories'));
        endif;

        // Image
        if ($request->file('photo') != null) {
            Storage::delete($man->image);
            $man->image = $request->file('photo')->store('people-image', 'public');
            $man->save();
        }

        // Forget cache
        self::forgetManCache($man);

        // Name
        $name = Name::where('name', $man->name)->get()->first();
        if ($name == null)
            Name::create(['name' => $man->name, 'male_female' => 1, 'number_of_name' => 1]);
        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function destroy(Man $man)
    {
        $man->is_removed = 1;
        $man->modified_by = auth()->user()->id;
        $man->save();

        // Forget cache
        self::forgetManCache($man);

        $father = Man::find($man->father_id);
        $father->update(['bala_sany' => ($father->bala_sany - 1)]);

        return redirect()->route('admin.man.edit', $father);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Man  $man
     * @return \Illuminate\Http\Response
     */
    public function image_delete(Man $man)
    {
        Storage::disk('public')->delete($man->image);

        $man->update(['image' => null]);

        return redirect()->route('admin.man.edit', $man);
    }

    /**
     * Move up the man, change order
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function up(Request $request)
    {
        $upman = Man::find($request['upid']);
        $downman = Man::find($request['downid']);
        if ($upman->kanchanchy_bala === $downman->kanchanchy_bala) {
            $brothers = $upman->where('father_id', $upman->father_id)->get();
            foreach ($brothers as $key => $brother) {
                if ($brother->id === $downman->id) {
                    $brother->update(['kanchanchy_bala' => $key + 1]);
                    continue;
                } elseif ($brother->id === $upman->id) {
                    $brother->update(['kanchanchy_bala' => $key + 1]);
                }
            }
        }
        $up_man_order = $upman->kanchanchy_bala;
        $upman->update(['kanchanchy_bala' => $downman->kanchanchy_bala]);
        $downman->update(['kanchanchy_bala' => $up_man_order]);
        return redirect()->route('admin.man.edit', $upman);
    }

    /**
     * Forget the man cache
     *
     * @param  \App\Man  $man
     */
    public static function forgetManCache(Man $man)
    {
        cache()->forget('man-query-'.$man->id);
        cache()->forget('man-'.$man->id);
        if($man->categories) {
            foreach($man->categories as $category) {
                cache()->forget('famous-people-'.$category->slug);
            }
        }

        // Forget the father's cache
        cache()->forget('man-query-'.$man->father_id);
        cache()->forget('man-'.$man->father_id);
        if($man->father->categories) {
            foreach($man->father->categories as $category) {
                cache()->forget('famous-people-'.$category->slug);
            }
        }
    }
}
