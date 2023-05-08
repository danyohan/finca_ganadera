<?php

namespace App\Http\Controllers;

use App\Controller\Dto\ResponseStatusCode;
use App\Interfaces\GenericInterface;
use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Color;
use App\Models\Paddock;
use App\Models\Race;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;


class AnimalController extends Controller
{

    private $genericInterface;
    private const VIEW = '/animal';

    public function __construct(GenericInterface $genericInterface)
    {
        $this->genericInterface = $genericInterface;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $animals = $this->genericInterface->getData();

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
            $file = $request->file('image');
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->request->add([
                'path' => $imageName,
            ]);

            $request->file('image')->storeAs('images', $imageName);
            //$request->file->move(public_path('image'), $imageName);
            $file->move('images/', $imageName );
        }

        $this->genericInterface->create($request->all());

        return redirect(self::VIEW);
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
        $animal = $this->genericInterface->getById($id);
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

            $this->genericInterface->update($request->all(), $animal);
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
        $this->genericInterface->delete($id);
        return redirect(self::VIEW);
    }
}
