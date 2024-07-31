<?= require loadPartial('head'); ?>
<?= require loadPartial('navbar'); ?>
<?= require loadPartial('top-banner'); ?>

<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3"><?= $status ?></div>
        <p class="text-center text-2xl mb-4">
            <?= $message ?>
        </p>
        <a class="block text-center" href="/listings"> Go back to listings</a>
    </div>
</section>

<?= require loadPartial('bottom-banner'); ?>
<?= require loadPartial('footer'); ?>