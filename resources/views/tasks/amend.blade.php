@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='row'> 
            <div class="col-sm-offset-2 col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Amend Task
                    </div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- Edit Task Form -->
                        <form action="{{ url('task/'.$task->id) }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Task</label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                                </div>
                            </div>

                            <!-- Save Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-floppy-o"></i>Save Task
                                    </button>
                                    <!-- Cancel Save Task Button -->
                                    <!--<a class="btn btn-default fa fa-btn fa-ban" href="{{ url('/') }}">Cancel</a>-->
                                    <button type="button" class="btn btn-default" onclick="location.href='{{ url('/') }}'">
                                        <i class="fa fa-btn fa-ban"></i>Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
