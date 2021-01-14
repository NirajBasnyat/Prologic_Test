@extends('layouts.master')

@section('content')

<div class="card mt-3">
    <div class="card-body">
        {!! $dataTable->table() !!}
    </div>
</div>

@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>

<script src="http://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

{!! $dataTable->scripts() !!}

@endsection