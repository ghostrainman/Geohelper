<?php
IncludeModuleLangFile(__FILE__);
$mid = 'intaro.geohelper';
$uri = $APPLICATION->GetCurPage() . '?mid=' . htmlspecialchars($mid) . '&lang=' . LANGUAGE_ID;

//update connection settings
if (isset($_POST['Update']) && ($_POST['Update'] == 'Y')) {
    //тут обработка
    if ($_POST['api-key']) {
        COption::SetOptionString($mid,"api_key",$_POST['api-key']);
    } else {
        COption::SetOptionString($mid,"api_key", false);
    }
    $uri .= '&ok=Y';
    LocalRedirect($uri);
} else {
    $apiKey = COption::GetOptionString($mid, "api_key", false);
    $aTabs = array(
        array(
            "DIV" => "edit1",
            "TAB" => getMessage('GEOHELPER_SETTINGS'),
            "ICON" => "",
            "TITLE" => getMessage('GEOHELPER_SETTINGS')
        )
    );
    $tabControl = new CAdminTabControl("tabControl", $aTabs);
    $tabControl->Begin();
    ?>
    <form method="POST" action="<?php echo $uri; ?>" id="FORMACTION">
        <?php
        echo bitrix_sessid_post();
        $tabControl->BeginNextTab();
        ?>
        <input type="hidden" name="tab" value="catalog">
        <tr class="heading">
            <td colspan="2"><b><?=getMessage('GEOHELPER_SETTINGS');?></b></td>
        </tr>
        <tr>
            <td width="50%" class="adm-detail-content-cell-l"><?=getMessage('GEOHELPER_API_KEY');?></td>
            <td width="50%" class="adm-detail-content-cell-r"><input type="text" name="api-key" value="<?=$apiKey?>"></td>
        </tr>

        <?php $tabControl->Buttons(); ?>
        <input type="hidden" name="Update" value="Y" />
        <input type="submit" title="<?=getMessage('GEOHELPER_SAVE_BTN');?>" value="<?=getMessage('GEOHELPER_SAVE_BTN');?>" name="btn-update" class="adm-btn-save" />
        <?php $tabControl->End(); ?>
    </form>
<?php } ?>