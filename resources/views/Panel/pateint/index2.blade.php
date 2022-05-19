@extends('Panel.layouts.index')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Pateints Page</div>
                <div class="card-body">
                    <a href="{{ route('pateint.create') }}" class="btn btn-success btn-sm" title="Add New pateint">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New Pateint
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>idPateints</th>
                                     <th>name</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>DataOfBirth</th>
                                    <th>addres</th>
                                    <th>phone</th>
                                    <th>gender</th>
                                    <th>user_ID</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pateint as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- <td>{{ $item->idPateints }}</td> -->
                                        <td>{{ $item->user ? $item->user->name : '' }}</td>
                                        <td>{{ $item->user ? $item->user->email : '' }}</td>
                                        <td>{{ $item->user ? $item->user->password : '' }}</td>
                                        <td>{{ $item->DataOfBirth }}</td>
                                        <td>{{ $item->addres }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->gender }}</td>


                                        <td>{{ $item->user_ID }}</td>
                                        <td>
                                            <a href="{{ route('pateint.show', [$item->idPateints]) }}"
                                                title="View Pateint"><button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ route('pateint.edit', [$item->idPateints]) }}"
                                                title="Edit Pateint"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pen" aria-hidden="true"></i> </button></a>
                                            <form method="POST" action="{{ route('pateint.destroy', [$item->idPateints]) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete Pateint"
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