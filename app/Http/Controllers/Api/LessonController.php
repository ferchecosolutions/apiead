<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreView;
use App\Http\Resources\LessonResource;
use App\Repositories\LessonRepository;


class LessonController extends Controller
{
    protected $repositoy;

    public function __construct(LessonRepository $lessonRepository)
    {
        $this->repositoy = $lessonRepository;
    }
    public function index($moduleId)
    {
        $modules = $this->repositoy->getLessonsByModulesId($moduleId);

        return LessonResource::collection($modules);
    }

    public function show($id)
    {
        return new LessonResource($this->repositoy->getLesson($id));
    }

    public function viewed(StoreView $request)
    {
        $this->repository->markLessonViewed($request->lesson);

        return response()->json(['success' => true]);
    }
}
