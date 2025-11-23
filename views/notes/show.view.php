<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-6"><a href="/notes" class="text-blue-500 underline">Go back</a></p>
            <p><?= htmlspecialchars($note['body']) ?></p>

            <footer class="mt-6">
                <a href="/note/edit?id=<?= $note['id'] ?>"
                   class="rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-orange-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-300">
                    Edit
                </a>
            </footer>
        </div>
    </main>

<?php require basePath('views/partials/footer.php'); ?>