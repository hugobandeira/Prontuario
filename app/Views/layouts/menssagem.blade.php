@if(session()->has('message'))
    <div class="container" style="width: 100%">
        <div class="alert alert-success" style="padding-left: 2em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('message') }}
        </div>
    </div>
@endif

@if(session()->has('erro'))
    <div class="container" style="width: 100%">
        <div class="alert alert-error" style="padding-left: 2em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('erro') }}
        </div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="container" style="width: 100%">
        <div class="alert alert-danger alert-dismissible" role="alert" style="padding-left: 2em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(session()->has('cadastro'))
    <div class="container" style="width: 100%">
        <div class="alert alert-success" style="padding-left: 2em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('message') }}
        </div>
    </div>
@endif