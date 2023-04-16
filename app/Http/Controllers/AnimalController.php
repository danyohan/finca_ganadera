<?php

namespace App\Http\Controllers;

use App\Controller\Dto\ResponseStatusCode;
use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Color;
use App\Models\Paddock;
use App\Models\Race;
use App\Models\Status;
use App\Services\AnimalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;


class AnimalController extends Controller
{

    private AnimalService $animalService;

    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $animals = $this->animalService->getAnimals();

        return view('animal.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $races = Race::all()->sortBy('name');
        $colors = Color::all()->sortBy('name');
        $states = Status::all()->sortBy('name');
        $types = AnimalType::all()->sortBy('name');
        $paddocks = Paddock::all()->sortBy('name');
        return view('animal.create', compact('races', 'colors', 'states', 'types', 'paddocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'race_id' => 'required',
                'color_id' => 'required',
                'age' => 'required',
                'weight' => 'required',
            ]
        );

        if ($request->hasFile('image')) {
            $imageName = time().'_'. $request->file('image')->getClientOriginalName();

            $request->request->add([
                'path' => $imageName ,
            ]);

           $request->file('image')->storeAs('images', $imageName);
            //Storage::disk('public')->put('images', $request->file('image'));
        }

        $this->animalService->createAnimal($request->all());

        return redirect('/animal');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        $races = Race::all()->sortBy('id');
        $colors = Color::all()->sortBy('name');
        $states = Status::all()->sortBy('name');
        $types = AnimalType::all()->sortBy('name');
        $paddocks = Paddock::all()->sortBy('name');
        return view('animal.edit', compact('animal', 'races', 'colors', 'states', 'types', 'paddocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate(
            [
                'race_id' => 'required',
                'color_id' => 'required',
                'paddock_id' => 'required',
                'status_id' => 'required',
                'age' => 'required',
                'weight' => 'required',
                //'file' => 'mimes:png,jpg,jpeg|max:2048'
            ]
        );

        try {

            $this->animalService->updateAnimal($request->all());
            //$animal->update($request->all());

            return redirect('/animal');

        } catch (Throwable $exception) {
            return new JsonResponse([
                'error' => [
                    'message' => $exception->getMessage(),
                    'code' => Response::HTTP_NOT_FOUND,
                ]
            ], 409);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->animalService->deleteAnimal($id);
        return redirect('/animal');
    }
}