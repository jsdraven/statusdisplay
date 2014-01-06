<?php
  include_once('lib/nusoap.php');
$host = 'webmail.fosterdairyfarms.com';
$username = 'ittemp@fosterdairyfarms.com';
$password = 'Flarflovin43';

  $endpoint = 'http://localhost/services.wsdl';
  $wsdl = true;
  $soapclient = new nusoap_client($endpoint, $wsdl);

  $soapclient->setCredentials($username, $password, 'ntlm');
  $soapclient->setGlobalDebugLevel(9);

  $xml =<<<XML1
  <FindItem xmlns="http://schemas.microsoft.com/exchange/services/2006/messages"
   xmlns:t="http://schemas.microsoft.com/exchange/services/2006/types" Traversal="Shallow">
  <ItemShape>
    <t:BaseShape>IdOnly</t:BaseShape>
    <t:AdditionalProperties>
      <t:FieldURI FieldURI="message:From"/>
      <t:FieldURI FieldURI="item:Subject"/>
      <t:FieldURI FieldURI="message:IsRead"/>
      <t:FieldURI FieldURI="item:DateTimeReceived"/>
      <t:FieldURI FieldURI="calendar:Start"/>
      <t:FieldURI FieldURI="calendar:End"/>
      <t:FieldURI FieldURI="calendar:Location"/>
      <t:FieldURI FieldURI="task:Status"/>
      <t:FieldURI FieldURI="task:DueDate"/>
    </t:AdditionalProperties>
  </ItemShape>
  <IndexedPageItemView Offset="0" MaxEntriesReturned="5" BasePoint="Beginning"/>
  <ParentFolderIds>
    <t:DistinguishedFolderId Id="inbox"/>
  </ParentFolderIds>
</FindItem>
XML1;

  $operation = 'FindItem';
  $result = $soapclient->call($operation, $xml);
  
  echo '<pre>'; var_dump($result); echo '</pre>';
?>