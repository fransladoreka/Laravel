<ul class="tree-root">
    @foreach($akun as $account)
        @include('akun.partials.node',['account'=>$account])
    @endforeach
</ul>