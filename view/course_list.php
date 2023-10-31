<?php include('view/header.php') ?>

<?php if($courses) { ?>
    <section id="list" class="list">
        <header class="list__row__list__header">
            <h1>Lista Corsi</h1>
        </header>

        <?php foreach ($courses as $course) : ?>
            <div class="list__row">
                <div class="list__item">
                    <p class="bold"><?= $course['courseName'] ?></p>
                </div>
                <div class="list__removeItem">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?= $course['courseID'] ?>">
                        <button class="remove-button">x</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
    <?php } else { ?>
        <p>Nessun corso esistente per ora.</p>
    <?php } ?>

<section id="add" class="add">
    <h2>Aggiungi Corso</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_course">
        <div class="add__inputs">
            <label>Nome:</label>
            <input type="text" name="course_name" maxlength="50" placeholder="Nome" autofocus required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Aggiungi</button>
        </div>
    </form>
</section>
<br>
<p><a href=".">Vedi &amp; Aggiungi Compito</a></p>
<?php include('view/footer.php') ?>