<?php

$server = "https://webmail.fosterdairyfarms.com/";


class NTLMSoapClient extends SoapClient {
		function __doRequest($request, $location, $action, $version, $one_way = NULL) {
			$headers = array(
				'Method: POST',
				'Connection: Keep-Alive',
				'User-Agent: PHP-SOAP-CURL',
				'Content-Type: text/xml; charset=utf-8',
				'SOAPAction: "'.$action.'"',
			);  
			$this->__last_request_headers = $headers;
			$ch = curl_init($location);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_POST, true );
			curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
			curl_setopt($ch, CURLOPT_USERPWD, $this->user.':'.$this->password);
			// For debugging purposes
			// return transfer data as a result
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// read headers
			curl_setopt($ch, CURLOPT_HEADER, 1);
			// show request headers, will display all the outgoing info, including fields
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);

			$response = curl_exec($ch);
			return $response;
		}   
		function __getLastRequestHeaders() {
			return implode("n", $this->__last_request_headers)."n";
		}   
	}

class NTLMStream {
		private $path;
		private $mode;
		private $options;
		private $opened_path;
		private $buffer;
		private $pos;

		public function stream_open($path, $mode, $options, $opened_path) {
			echo "[NTLMStream::stream_open] $path , mode=$mode n";
			$this->path = $path;
			$this->mode = $mode;
			$this->options = $options;
			$this->opened_path = $opened_path;
			$this->createBuffer($path);
			return true;
		}

		public function stream_close() {
			echo "[NTLMStream::stream_close] n";
			curl_close($this->ch);
		}

		public function stream_read($count) {
			echo "[NTLMStream::stream_read] $count n";
			if(strlen($this->buffer) == 0) {
				return false;
			}
			$read = substr($this->buffer,$this->pos, $count);
			$this->pos += $count;
			return $read;
		}

		public function stream_write($data) {
			echo "[NTLMStream::stream_write] n";
			if(strlen($this->buffer) == 0) {
				return false;
			}
			return true;
		}

		public function stream_eof() {
			echo "[NTLMStream::stream_eof] ";
			if($this->pos > strlen($this->buffer)) {
				echo "true n";
				return true;
			}
			echo "false n";
			return false;
		}

		/* return the position of the current read pointer */
		public function stream_tell() {
			echo "[NTLMStream::stream_tell] n";
			return $this->pos;
		}

		public function stream_flush() {
			echo "[NTLMStream::stream_flush] n";
			$this->buffer = null;
			$this->pos = null;
		}

		public function stream_stat() {
			echo "[NTLMStream::stream_stat] n";
			$this->createBuffer($this->path);
			$stat = array(
				'size' => strlen($this->buffer),
			);
			return $stat;
		}

		public function url_stat($path, $flags) {
			echo "[NTLMStream::url_stat] n";
			$this->createBuffer($path);
			$stat = array(
				'size' => strlen($this->buffer),
			);
			return $stat;
		}

		/* Create the buffer by requesting the url through cURL */
		private function createBuffer($path) {
			if($this->buffer) {
				return;
			}
			echo "[NTLMStream::createBuffer] create buffer from : $pathn";
			$this->ch = curl_init($path);
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($this->ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($this->ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
			curl_setopt($this->ch, CURLOPT_USERPWD, $this->user.':'.$this->password);
			echo $this->buffer = curl_exec($this->ch);
			echo "[NTLMStream::createBuffer] buffer size : ".strlen($this->buffer)."bytesn";
			$this->pos = 0;
		}
	}


	class ExchangeNTLMStream extends NTLMStream {
		protected $user = 'ittemp@fosterdairyfarms.com';
		protected $password = 'Flarflovin43';
	}

	class ExchangeNTLMSoapClient extends NTLMSoapClient {
		protected $user = 'ittemp@fosterdairyfarms.com';
		protected $password = 'Flarflovin43';
	}


	stream_wrapper_unregister('https');
	stream_wrapper_register('https', 'ExchangeNTLMStream') or die("Failed to register protocol");
	$wsdl = "services.wsdl";
	$client = new ExchangeNTLMSoapClient($wsdl);
	
	/* Do something with the web service connection */

/*echo "<pre>";
print_r($client->__getTypes());
echo "</pre>";*/


/*	stream_wrapper_restore('https');
$FindFolder->Traversal = "Shallow";
	$FindFolder->FolderShape->BaseShape = "Default";
	$FindFolder->ParentFolderIds->DistinguishedFolderId->Id = "root";
	$result = $client->FindFolder($FindFolder);
	$folders = $result->ResponseMessages->FindFolderResponseMessage->RootFolder->Folders->Folder;
	foreach($folders as $folder) {
		echo $folder->DisplayName."n";
	}
*/

$data = curl_exec($ch);
$errors = curl_error($ch);
// get info about the transfer, for debugging purposes
$details = curl_getinfo($ch); 

curl_close($ch);

// Displaying debugging info
var_dump($data);
var_dump($errors);
var_dump($details);	

$FindItem->Traversal = "Shallow";
	$FindItem->ItemShape->BaseShape = "AllProperties";
	$FindItem->ParentFolderIds->DistinguishedFolderId->Id = "calendar";
	$FindItem->CalendarView->StartDate = "2008-12-01T00:00:00Z";
	$FindItem->CalendarView->EndDate = "2008-12-31T00:00:00Z";
	$result = $client->FindItem($FindItem);
	$calendaritems = $result->ResponseMessages->FindItemResponseMessage->RootFolder->Items->CalendarItem;
	print_r($calendaritems);