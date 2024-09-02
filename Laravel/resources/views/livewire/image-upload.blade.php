<div class="container">
    <div class="">
        <img src="{{ asset('assets/img/logo.png') }}" class="logo" />
    </div>
    <h1>See the change <br> <span> Breathe the difference</span></h1>
    <div class="img">
        <img src="{{ asset('assets/img/line.svg') }}" alt="">
    </div>
    <input type="file" wire:model.live="image" id="image" style="display: none;">
    @if ($image)
        <button name="upload" wire:click="submit()" wire:loading.attr="disabled">
            {{ $uploading ? 'Uploading...' : 'Try it now : ' . $imageName }}
        </button>
    @else
        <button type="button" onclick="document.getElementById('image').click();">
            {{ $imageName }}
        </button>
        @error('image')
            <span class="error">{{ $message }}</span>
        @enderror
    @endif
    <img src="{{ asset('assets/img/home-img.png') }}" class="home-img" alt="">
</div>
