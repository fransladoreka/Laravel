<li>
    <div class="tree-item" data-id="{{ $account->id }}">
        @if($account->children->count())
        <span class="toggle">+</span>
        @else
        <span class="toggle"></span>
        @endif
        
        <span hidden class="folder-kode">{{ $account->kode }}</span>
        <i class="fas fa-folder text-warning me-1"></i>
        <span class="folder-name">
            {{ $account->akun }}
        </span>
    </div>

    @if($account->children->count())
    <ul class="children" style="display: none;">
        @foreach($account->children as $child)
        @include('akun.partials.node', ['account' => $child])
        @endforeach
    </ul>
    @endif
</li>