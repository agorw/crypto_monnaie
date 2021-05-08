<div id="todo" class="todo">
    <ul>
        <li class="active">
            <strong>Liste des devises</strong>
        </li>
        <li>
            <img src="https://assets.coingecko.com/coins/images/1/thumb/bitcoin.png?1547033579" alt="Logo Bitcoin">
            <a id="bitcoin" onclick="getId(this.id);" href="#">Bitcoin</a>
        </li>
        <?php foreach (getDevise() as $value) { ?>
            <li>
                <img src="<?= $value['image'] ?>" alt="Logo <?= $value['name'] ?>">
                <a id="<?= $value['name'] ?>" onclick="getId(this.id);" href="#"><?= $value['name'] ?></a>
            </li>
        <?php } ?>
    </ul>
    <input id="devise" class="add_devise" type="text" placeholder="Nom de la devise" />
    <a id="add" class="btn">
        <i class="fas fa-plus-circle"></i>
    </a>
</div>