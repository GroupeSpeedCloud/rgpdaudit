<table cellpadding="0" cellspacing="0" border="0" style="font-family: 'Titillium Web', Arial, sans-serif; font-size: 14px; color: #333333; line-height: 1.4;">
  <tbody>
    <tr>
      <td style="vertical-align: top; padding-right: 16px;">
        <img src="<?= $company['logo'] ?>" alt="<?= $company['name'] ?>" width="90" height="90" style="display: block; border-radius: 12px;">
      </td>
      <td style="vertical-align: top; border-left: 2px solid #8a4dfd; padding-left: 16px;">
        <!-- Name & Job -->
        <table cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-bottom: 8px;">
              <span style="font-size: 17px; font-weight: 700; color: #1a1a1a; display: block; line-height: 1.2;"><?= $name ?></span>
              <?php if ($job): ?>
              <span style="font-size: 13px; color: #8a4dfd; font-weight: 600; display: block; margin-top: 2px;"><?= $job ?></span>
              <?php endif; ?>
            </td>
          </tr>
        </table>
        
        <!-- Separator -->
        <table cellpadding="0" cellspacing="0" border="0" width="200">
          <tr><td style="border-bottom: 1px solid #e5e5e5; height: 1px; font-size: 1px;">&nbsp;</td></tr>
          <tr><td height="8"></td></tr>
        </table>
        
        <!-- Contact Info -->
        <table cellpadding="0" cellspacing="0" border="0" style="font-size: 12px; color: #555555;">
          <tr>
            <td style="padding-bottom: 4px;">
              <a href="mailto:<?= $email ?>" style="color: #555555; text-decoration: none;"><?= $email ?></a>
            </td>
          </tr>
          <tr>
            <td style="padding-bottom: 4px;">
              <a href="<?= $company['website'] ?>" style="color: #8a4dfd; text-decoration: none; font-weight: 600;"><?= $company['domain'] ?></a>
            </td>
          </tr>
          <tr>
            <td>
              <span style="color: #888888;"><?= $company['address'] ?></span>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </tbody>
</table>