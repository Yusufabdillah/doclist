<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 15:24
 */
if (isset($_SESSION['NOTIFY'])) {
    $EXP = explode("/", $_SESSION['NOTIFY']);
    $NOTIFY_TYPE = $EXP[0];
    if ($NOTIFY_TYPE == "Create") {
        $config = array(
            'icon' => 'la la-plus-circle',
            'title' => $EXP[0],
            'message' => $EXP[1],
            'type' => 'success',
            'timer' => 200,
            'from'  => 'top',
            'align' => 'right'
        );
    } if ($NOTIFY_TYPE == "Update") {
        $config = array(
            'icon' => 'la la-pencil',
            'title' => $EXP[0],
            'message' => $EXP[1],
            'type' => 'info',
            'timer' => 200,
            'from'  => 'top',
            'align' => 'right'
        );
    } if ($NOTIFY_TYPE == "Delete") {
        $config = array(
            'icon' => 'la la-trash',
            'title' => $EXP[0],
            'message' => $EXP[1],
            'type' => 'danger',
            'timer' => 200,
            'from'  => 'top',
            'align' => 'right'
        );
    } if ($NOTIFY_TYPE == "Error") {
        $config = array(
            'icon' => 'la la-info-circle',
            'title' => $EXP[0],
            'message' => $EXP[1],
            'type' => 'warning',
            'timer' => 200,
            'from'  => 'top',
            'align' => 'right'
        );
    }
?>
    <script type="text/javascript">
        $.notify({
            title: "<?= $config['title']; ?>",
            icon: "icon <?= $config['icon']; ?>",
            message: "<?= $config['message']; ?>"
        },{
            mouse_over: true,
            showProgressbar: false,
            type: "<?= $config['type']; ?>",
            timer: <?= $config['timer']; ?>,
            placement: {
                from: "<?= $config['from']; ?>",
                align: "<?= $config['align']; ?>"
            },
            animate: {
                enter: 'animated pulse',
                exit: 'animated pulse'
            }
        });
    </script>
<?php
}
