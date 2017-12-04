<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: hugo-->
<!-- * Date: 12/1/17-->
<!-- * Time: 12:38 AM-->
<!-- */-->

<?php if (isset($_SESSION['msg'])): ?>
    <div class="container" style="width: 100%">
        <div class="alert alert-success" style="padding-left: 2em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= $_SESSION['msg']; ?>
            <?php unset($_SESSION['msg']) ?>
        </div>
    </div>
<?php endif; ?>



<?php if (isset($_SESSION['erro'])): ?>
    <div class="container" style="width: 100%">
        <div class="alert alert-danger" style="padding-left: 2em;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= $_SESSION['erro']; ?>
            <?php unset($_SESSION['erro']) ?>
        </div>
    </div>
<?php endif; ?>
