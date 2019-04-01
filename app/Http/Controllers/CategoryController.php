<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Category;
use App\Book;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        /*
            - add a middleware with an argument of 'is.admin'
                - $this->?('?');
        */
        $this->middleware('is.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*
            - get all instances of the Category model and save the result as a variable named $categories
                - $categories = ?::?();

            - return the 'categories.category_list' view, using the compact() method to pass the $categories variable
                - return ?('?', compact('?'));
        */
        $categories = Category::all();
        return view('categories.category_list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*
            - return the 'categories.add_categories' view
                - return ?('?');
        */

       return view('categories.add_categories');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
            - validate $request. Pass an array with the ff. fields to validate: 
                - name
                    - required, should be a string
            - save the result as a variable named $validatedData

                - $validatedData = ?->?([
                    '?' => ['?', '?'],
                ]);

            - instantiate a new Category object and save it as a variable named $category
                - $category = ? ?;

            - set the name property of $category to be equal to the name property of $request
                - $category->name = ?->?;

            - set the description property of $category to be equal to the description property of $request
                - $category->description = ?->?;

            - use the save() method on $category
                - $category->?();

            - redirect to '/categories'
                - return ?('?');
        */

        $validatedData = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'category_description' => ['string', 'max:255'],
        ]);

        return Category::create([
            'name' => $request['category_name'],
            'description' => $request['category_description'],
        ]);

        
        //TANONG MO KAY SIR BAKIT AYAW TONG GUMANA. KAINIS MUCH

        // return Category::create([
        //     'name' => $request['category_name'],
        //     'description' => $request['category_description'],
        // ]);
 
        // $category->save();
       
        // return redirect('/categories');

        $category = new Category;


        $category->save();

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        /*
            - return the 'categories.edit_categories' view, using the compact() method to pass the variable $category
                - return ?('?', compact('?'));
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        /*
            - return the 'categories.edit_categories' view, using the compact() method to pass the variable $category
                - return ?('?', compact('?'));
        */
        return view('categories.edit_categories', compact('category'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        /*
            - validate $request. Pass an array with the ff. fields to validate: 
                - name
                    - required, should be a string
            - save the result as a variable named $validatedData

                - $validatedData = ?->?([
                    '?' => ['?', '?'],
                ]);

            - set the name property of $category to be equal to the name property of $request
                - $category->name = ?->?;

            - set the description property of $category to be equal to the description property of $request
                - $category->description = ?->?;

            - use the save() method on $category
                - $category->?();

            - redirect to '/categories'
                - return ?('?');
        */

        $validatedData = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'category_description' => ['string', 'max:255'],
        ]);

        $category->name = $request->category_name;
        $category->description = $request->category_description;

        $category->save();

        return redirect('/categories');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        /*
            DISABLE INSTEAD OF DELETE

            - set the status property of $category equal to 0 if it's currently set to 1 and vice versa
                - $category->? = ?->? == ?;

            - use the save method on $category
                - $category->?();

            - redirect to '/categories'
                - return ?('?');
        */
        dd($category);

        $category = Category::find($category->id);


        $category->status = "0";
        

        $category->save();

        return back();
    }

    public function activate($id)
    {
        /*
            - selectively query the User model using the find() method with the passed $id as its argument. Save the result as a variable named $user
                - $user = ?::?(?);

            - set the status property of $user to be equal to 1
                - $user->? = '?';

            - use the save() method on $user
                - $user->?();

            - redirect to  '/users'
                - return ?('?');
        */

        $category = Category::find($id);

        $category->status = "1";

        $category->save();

        return back();

    }
}


