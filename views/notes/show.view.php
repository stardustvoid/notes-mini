<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-6"><a href="/notes" class="text-blue-500 underline">Go back</a></p>
            <p><?= htmlspecialchars($note['body']) ?></p>


            <form class="mt-3" method="POST">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit" class="text-red-500 text-sm">
                    Delete
                </button>
            </form>
        </div>
    </main>

<?php require basePath('views/partials/footer.php'); ?>