<?php
$title = 'Accueil';
ob_start(); // Commence à enregistrer le code html
// aide pour savoir ou on est echo getcwd();
require_once '../src/view/ticket.php';
?>
<div class="row mt-1 wrap">
    <?php include '../src/view/todo.php'; ?>
    <?php include '../src/view/graph.php'; ?>
</div>
<?php
$content = ob_get_clean(); // Stock tout le code html enregistré dans la variable $content
?>

<?php require '../template-base.php'; ?>