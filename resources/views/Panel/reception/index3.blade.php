@extends('Panel.layouts.index')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Reception Page</div>
                <div class="card-body">
                    <a href="{{ route('recepte.create') }}" class="btn btn-success btn-sm" title="Add New reception">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>User_id</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reception as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- <td>{{ $item->id }}</td> -->
                                        <td>{{ $item->user ? $item->user->name : '' }}</td>
                                        <td>{{ $item->user ? $item->user->email : '' }}</td>
                                        <td>{{ $item->user ? $item->user->password : '' }}</td>
                                        <td>{{ $item->User_id }}</td>


                                        <td>
                                            <a href="{{ route('recepte.show', [$item->id]) }}"
                                                title="View reception"><button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ route('recepte.edit', [$item->id]) }}"
                                                title="Edit reception"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pen" aria-hidden="true"></i> </button></a>
                                            <form method="POST"
                                                action="{{ route('recepte.destroy', [$item->id]) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete reception"
                                                    onclick="return confirm('Are you want to delete this ?')"><i
                                                        class="fa fa-trash" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
