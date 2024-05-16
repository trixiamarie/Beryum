@php
    $modals = [
        "Hello there! I'm Trixia Marie Lorenzana, and I'm thrilled to welcome you to Beryum— my vibrant, interactive portfolio where I share my journey as a full-stack developer!",
        "Click here to register or login! Don't worry, once you logout or the session expires, your account will be destroyed! Puff!",
        "Do you want to skip the tutorial?",
        "Here you can post a new recipe or post!",
        "You can add friends or remove them!",
        "Here you can send messages to other users, try sending one to me! I'm already your friend!",
        "You can also create groups for your communities and share with your loved ones your recipes and tricks in the kitchen!",
        "Click here to check your profile!",
        "Where's the fun if I tell you everything? Keep exploring!"
    ];
@endphp

<!-- Includi i modali -->
@for($i = 0; $i < count($modals); $i++)
<div class="modal fade" id="tutorialModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="tutorialModalLabel{{$i}}" aria-hidden="true" data-next-modal-id="tutorialModal{{ $i < count($modals) - 1 ? $i + 1 : '' }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tutorialModalLabel{{$i}}">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$modals[$i]}}
            </div>
        </div>
    </div>
</div>
@endfor

<!-- Script per aprire automaticamente il primo modal all'avvio della pagina -->
<script>
    $(document).ready(function() {
        $('#tutorialModal0').modal('show'); // Apri automaticamente il primo modal del tutorial

        // Quando un modal viene nascosto, apri il successivo
        $('.modal').on('hidden.bs.modal', function () {
            // Ottieni l'ID del modal successivo
            var nextModalId = $(this).data('next-modal-id');

            // Se esiste un modal successivo, aprilo
            if (nextModalId) {
                $('#' + nextModalId).modal('show');
            }
        });
    });
</script>
