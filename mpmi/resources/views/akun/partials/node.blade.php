<li class="tree-item" data-id="{{ $account->id }}">
    <span hidden class="folder-kode">{{ $account->kode }}</span>
    <span class="folder-name">
        {{ $account->akun }}
    </span>

    @if($account->children->count())
    <ul class="children" style="display: none;">
        @foreach($account->children as $child)
        @include('akun.partials.node', ['account' => $child])
        @endforeach
    </ul>
    @endif
</li>
