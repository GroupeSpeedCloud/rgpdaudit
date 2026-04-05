<table cellpadding="0" cellspacing="0" border="0" style="font-family: 'Segoe UI', Arial, sans-serif; font-size: 14px; color: #333;">
  <tr>
    <td style="padding-bottom: 2px;">
      <span style="font-size: 14px; font-weight: 700; color: #1a1a1a;"><?= $name ?></span>
    </td>
  </tr>
  <tr>
    <td>
      <?php if ($job): ?>
      <span style="font-size: 12px; color: #8a4dfd; font-weight: 600;"><?= $job ?></span>
      <span style="font-size: 12px; color: #888888;"> · </span>
      <?php endif; ?>
      <span style="font-size: 12px; color: #888888;"><?= $company['name'] ?></span>
    </td>
  </tr>
</table>
