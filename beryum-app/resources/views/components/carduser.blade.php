<style>
    .profiloutente {
        top: 10%;
        left: 15%;
       width: 40rem;
    }

    .profiloutente img {
        height: 10rem;
        width: 10rem;
    }

    .profiloutente .nomecognome {
        font-size: 2rem;
        color: white;
        text-shadow: 1px 1px 5px black;
        font-weight: 600;
        z-index: 2;
    }

    .img-thumbnail {
        max-width: none;
    }
</style>

<div class="card border-0 shadow-sm rounded-lg mb-3">
    <img src="{{ asset($user->cover) }}" class="card-img-top rounded-lg" alt="Copertina" style="height: 300px;">
    
    <div class="position-absolute profiloutente">
        <div class="d-flex flex-column align-items-center">
        <img src="{{ asset($user->avatar) }}" class="rounded-circle img-thumbnail position-relative" alt="Profilo">
        <div class="nomecognome text-center">
            <p class="text-white">{{ $user->name }} {{ $user->lastname }}</p>
            <p class="mb-0 text-white">&#64;{{ $user->username }}</p>
        </div>
        </div>
    </div>
</div>
