<?php

namespace App\Http\Controllers;

use App\lib\API\GitHub;
use Illuminate\View\View;

class ProjectsController extends Controller
{
  public function show(): View
  {
    $projects = GitHub::getInstance()->fetchAllRepos();

    return $this->view->load('home.project.overview');
  }
}
