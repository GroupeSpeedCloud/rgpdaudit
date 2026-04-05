<table cellpadding="0" cellspacing="0" border="0" style="font-family:Segoe UI, Tahoma, Arial, sans-serif; font-size:14px; color:#333333;">
  <tr>
    <td valign="top" style="padding-right:16px; vertical-align:top;">
      <img src="<?= $company['logo'] ?>" alt="<?= $company['name'] ?>" width="90" height="90" style="display:block;">
    </td>
    <td width="3" bgcolor="#8a4dfd" style="background-color:#8a4dfd;"></td>
    <td valign="top" style="padding-left:16px; vertical-align:top;">
      <table cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td style="font-size:17px; font-weight:bold; color:#1a1a1a; padding-bottom:2px;"><?= $name ?></td>
        </tr>
        <?php if ($job): ?>
        <tr>
          <td style="font-size:13px; color:#8a4dfd; font-weight:bold; padding-bottom:10px;"><?= $job ?></td>
        </tr>
        <?php else: ?>
        <tr><td style="padding-bottom:10px;"></td></tr>
        <?php endif; ?>
        <tr>
          <td height="1" bgcolor="#e5e5e5" style="font-size:1px; line-height:1px; background-color:#e5e5e5;">&nbsp;</td>
        </tr>
        <tr>
          <td style="padding-top:10px; font-size:12px; color:#555555;">
            <a href="mailto:<?= $email ?>" style="color:#555555; text-decoration:none;"><?= $email ?></a>
          </td>
        </tr>
        <tr>
          <td style="padding-top:4px; font-size:12px;">
            <a href="<?= $company['website'] ?>" style="color:#8a4dfd; text-decoration:none; font-weight:bold;"><?= $company['domain'] ?></a>
          </td>
        </tr>
        <tr>
          <td style="padding-top:4px; font-size:12px; color:#888888;"><?= $company['address'] ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
