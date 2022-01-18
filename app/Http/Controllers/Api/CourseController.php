<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $repositoy;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->repositoy = $courseRepository;
    }
    public function index()
    {
       return CourseResource::collection($this->repositoy->getAllCourses());
    }

    public function show($id)
    {
        return new CourseResource($this->repositoy->getCourse($id));
    }
}
