{include file="header.tpl" TITLE="Members"}

<table width="90%">
  <tr>
    <th style="text-align: left;">Username</th>
    <th style="text-align: left;">Level</th>
  </tr>

{foreach from=$members item=member}
  <tr>
    <td>{$member->username}</td>
    <td>{$member->level}</td>
  </tr>
{/foreach}
</table>

{include file="footer.tpl"}