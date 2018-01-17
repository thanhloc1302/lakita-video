
<?php
    
define('NGANLUONG_URL_CARD_POST', 'https://www.nganluong.vn/mobile_card.api.post.v2.php');
define('NGANLUONG_URL_CARD_SOAP', 'https://nganluong.vn/mobile_card_api.php?wsdl');

class Config {
    public static $_FUNCTION = "CardCharge";
    public static $_VERSION = "2.0";
    //Thay đổi 3 thông tin ở phía dưới
    public static $_MERCHANT_ID = "47015";
    public static $_MERCHANT_PASSWORD = "c725253e89498d0a026026ab12b73ffb";
    public static $_EMAIL_RECEIVE_MONEY = "lakita.vn@gmail.com";
}

class Result {

    var $error_code = "";
    var $merchant_id = "";
    var $merchant_account = "";
    var $pin_card = "";
    var $card_serial = "";
    var $type_card = "";
    var $order_id = "";
    var $client_fullname = "";
    var $client_email = "";
    var $client_mobile = "";
    var $card_amount = "";
    var $amount = "";
    var $transaction_id = "";
    var $error_message = "";

}

class MobiCard {

    function CardPay($pin_card, $card_serial, $type_card, $_order_id, $client_fullname, $client_mobile, $client_email) {
        $params = array(
            'func' => Config::$_FUNCTION,
            'version' => Config::$_VERSION,
            'merchant_id' => Config::$_MERCHANT_ID,
            'merchant_account' => Config::$_EMAIL_RECEIVE_MONEY,
            'merchant_password' => MD5(Config::$_MERCHANT_ID . '|' . Config::$_MERCHANT_PASSWORD),
            'pin_card' => $pin_card,
            'card_serial' => $card_serial,
            'type_card' => $type_card,
            'ref_code' => $_order_id,
            'client_fullname' => $client_fullname,
            'client_email' => $client_email,
            'client_mobile' => $client_mobile,
        );
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
//echo $post_field;
        $api_url = NGANLUONG_URL_CARD_POST;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        //print_r($result);
        //die();
        $kq = new Result();

        if ($result != '' && $status == 200) {
            $arr_result = explode("|", $result);
            if (count($arr_result) == 13) {
                $kq->error_code = $arr_result[0];
                $kq->merchant_id = $arr_result[1];
                $kq->merchant_account = $arr_result[2];
                $kq->pin_card = $arr_result[3];
                $kq->card_serial = $arr_result[4];
                $kq->type_card = $arr_result[5];
                $kq->order_id = $arr_result[6];
                $kq->client_fullname = $arr_result[7];
                $kq->client_email = $arr_result[8];
                $kq->client_mobile = $arr_result[9];
                $kq->card_amount = $arr_result[10];
                $kq->amount = $arr_result[11];
                $kq->transaction_id = $arr_result[12];

                if ($kq->error_code == '00') {
                    $kq->error_message = "Nạp thẻ thành công, mệnh giá thẻ = " . $kq->card_amount;
                } else {
                    $kq->error_message = $this->GetErrorMessage($kq->error_code);
                }
            }
        } else
            $kq->error_message = $error;

        return $kq;
    }

    function GetErrorMessage($error_code) {
        $arrCode = array(
            '00' => 'Giao dịch thành công',
            '99' => 'Lỗi, tuy nhiên lỗi chưa được định nghĩa hoặc chưa xác định được nguyên nhân',
            '01' => 'Lỗi, địa chỉ IP truy cập API của NgânLượng.vn bị từ chối',
            '02' => 'Lỗi, tham số gửi từ merchant tới NgânLượng.vn chưa chính xác (thường sai tên tham số hoặc thiếu tham số)',
            '03' => 'Lỗi, Mã merchant không tồn tại hoặc merchant đang bị khóa kết nối tới NgânLượng.vn',
            '04' => 'Lỗi, Mã checksum không chính xác (lỗi này thường xảy ra khi mật khẩu giao tiếp giữa merchant và NgânLượng.vn không chính xác, hoặc cách sắp xếp các tham số trong biến params không đúng)',
            '05' => 'Tài khoản nhận tiền nạp của merchant không tồn tại',
            '06' => 'Tài khoản nhận tiền nạp của merchant đang bị khóa hoặc bị phong tỏa, không thể thực hiện được giao dịch nạp tiền',
            '07' => 'Thẻ đã được sử dụng ',
            '08' => 'Thẻ bị khóa',
            '09' => 'Thẻ hết hạn sử dụng',
            '10' => 'Thẻ chưa được kích hoạt hoặc không tồn tại',
            '11' => 'Mã thẻ sai định dạng',
            '12' => 'Sai số serial của thẻ',
            '13' => 'Mã thẻ và số serial không khớp',
            '14' => 'Thẻ không tồn tại',
            '15' => 'Thẻ không sử dụng được',
            '16' => 'Số lần thử (nhập sai liên tiếp) của thẻ vượt quá giới hạn cho phép',
            '17' => 'Hệ thống Telco bị lỗi hoặc quá tải, thẻ chưa bị trừ',
            '18' => 'Hệ thống Telco bị lỗi hoặc quá tải, thẻ có thể bị trừ, cần phối hợp với NgânLượng.vn để tra soát',
            '19' => 'Kết nối từ NgânLượng.vn tới hệ thống Telco bị lỗi, thẻ chưa bị trừ (thường do lỗi kết nối giữa NgânLượng.vn với Telco, ví dụ sai tham số kết nối, mà không liên quan đến merchant)',
            '20' => 'Kết nối tới telco thành công, thẻ bị trừ nhưng chưa cộng tiền trên NgânLượng.vn');

        return $arrCode[$error_code];
    }

    function CardPayWebservice($pin_card, $card_serial, $type_card, $ref_code, $client_fullname, $client_mobile, $client_email) {

        $strparams = $pin_card . '|' . $type_card . '|' . $ref_code . '|' . Config::$_EMAIL_RECEIVE_MONEY . '|' . $client_fullname . '|' . $client_email . '|' . $client_mobile . '|' . $card_serial;

        $params = array(
            'merchant_id' => Config::$_MERCHANT_ID,
            'checksum' => MD5($strparams . '|' . Config::$_MERCHANT_PASSWORD),
            'params' => $strparams
        );

        $webservice = NGANLUONG_URL_CARD_SOAP; //"https://nganluong.vn/mobile_card_api.php?wsdl";
        $client = new nusoap_client($webservice, true);
        $result = $client->call('CardCharge_v2', $params);

        $kq = new Result();
        if ($result != '') {
            $arr_result = explode("|", $result);

            if (count($arr_result) == 12) {
                $kq->error_code = $arr_result[0];
                $kq->merchant_id = $arr_result[1];
                $kq->transaction_id = $arr_result[2];
                $kq->amount = $arr_result[3];
                $kq->pin_card = $arr_result[4];
                $kq->type_card = $arr_result[5];
                $kq->ref_code = $arr_result[6];
                $kq->merchant_account = $arr_result[7];
                $kq->client_fullname = $arr_result[8];
                $kq->client_email = $arr_result[9];
                $kq->client_mobile = $arr_result[10];
                $kq->card_amount = $arr_result[11];

                if ($kq->error_code == '00') {
                    $kq->error_message = "Nạp thẻ thành công, mệnh giá thẻ = " . $kq->card_amount;
                } else {
                    $kq->error_message = $this->GetErrorMessageV2($kq->error_code);
                }
            }
        } else
            $kq->error_message = 'Lỗi gọi webservice';

        return $kq;
    }

    function GetErrorMessageV2($error_code) {
        $arrCode = array(
            '00' => 'Thành công',
            '01' => 'Lỗi chưa xác minh',
            '05' => 'Mã thẻ nạp không đúng hoặc đã được sử dụng',
            '06' => 'Lỗi kết nối với hệ thống xác thực thẻ',
            '07' => 'Tài khoản nhận tiền nạp không tồn tại',
            '08' => 'Tài khoản truy cập hệ thống nạp thẻ tạm thời bị khóa',
            '09' => 'Khách hàng đang nạp thẻ bị khóa (do nhập sai mã thẻ liên tiếp)',
            '10' => 'Không nạp được tiền vào tài khoản NgânLượng.vn',
            '11' => 'Hệ thống NgânLượng.vn không sinh được phiếu thu',
            '12' => 'Phiếu thu tại NgânLượng.vn không cập nhật được trạng thái Đã thu tiền',
            '13' => 'Không chuyển tiền được vào tài khoản NgânLượng.vn của người nhận',
        );
        return $arrCode[$error_code];
    }

    function getParam($param_name) {
        $result = '';
        if (!empty($_POST[$param_name]))
            $result = trim($_POST[$param_name]);
        return $result;
    }       
}

define('URL_API', 'https://www.nganluong.vn/checkout.api.nganluong.post.php'); // Đường dẫn gọi api
define('RECEIVER', 'lakita.vn@gmail.com'); // Email tài khoản ngân lượng
define('MERCHANT_ID', '47015'); // Mã merchant kết nối
define('MERCHANT_PASS', 'c725253e89498d0a026026ab12b73ffb'); // Mật khẩu kết nôi

class NL_CheckOutV3 {

    public $url_api = 'https://www.nganluong.vn/checkout.api.nganluong.post.php';
    public $merchant_id = '';
    public $merchant_password = '';
    public $receiver_email = '';
    public $cur_code = 'vnd';

    function __construct($merchant_id, $merchant_password, $receiver_email, $url_api) {
        $this->version = '3.1';
        $this->url_api = $url_api;
        $this->merchant_id = $merchant_id;
        $this->merchant_password = $merchant_password;
        $this->receiver_email = $receiver_email;
    }

    function GetTransactionDetail($token) {
        ###################### BEGIN #####################
        $params = array(
            'merchant_id' => $this->merchant_id,
            'merchant_password' => MD5($this->merchant_password),
            'version' => $this->version,
            'function' => 'GetTransactionDetail',
            'token' => $token
        );

        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        if ($result != '' && $status == 200) {
            $nl_result = simplexml_load_string($result);
            return $nl_result;
        }

        return false;
        ###################### END #####################
    }

    /*

      Hàm lấy link thanh toán bằng thẻ visa
      ===============================
      Tham số truyền vào bắt buộc phải có
      order_code
      total_amount
      payment_method

      buyer_fullname
      buyer_email
      buyer_mobile
      ===============================
      $array_items mảng danh sách các item name theo quy tắc
      item_name1
      item_quantity1
      item_amount1
      item_url1
      .....
      payment_type Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
     */

    function VisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'VISA', //Phương thức thanh toán, nhận một trong các giá trị 'VISA','ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code' => $bank_code, //Phương thức thanh toán, nhận một trong các giá trị 'VISA','ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items)
        );
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }
        //die($post_field);

        $nl_result = $this->CheckoutCall($post_field);
        return $nl_result;
    }

    /*
      Hàm lấy link thanh toán qua ngân hàng
      ===============================
      Tham số truyền vào bắt buộc phải có
      order_code
      total_amount
      bank_code // Theo bảng mã ngân hàng

      buyer_fullname
      buyer_email
      buyer_mobile
      ===============================

      $array_items mảng danh sách các item name theo quy tắc
      item_name1
      item_quantity1
      item_amount1
      item_url1
      .....
      payment_type Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn

     */

    function BankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'ATM_ONLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code' => $bank_code, //Mã Ngân hàng
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items)
        );

        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }
        //$post_field="function=SetExpressCheckout&version=3.1&merchant_id=24338&receiver_email=payment@hellochao.com&merchant_password=5b39df2b8f3275d1c8d1ea982b51b775&order_code=macode_oerder123&total_amount=2000&payment_method=ATM_ONLINE&bank_code=ICB&payment_type=&order_description=&tax_amount=0&fee_shipping=0&discount_amount=0&return_url=http://localhost/testcode/nganluong.vn/checkoutv3/payment_success.php&cancel_url=http://nganluong.vn&buyer_fullname=Test&buyer_email=saritvn@gmail.com&buyer_mobile=0909224002&buyer_address=&total_item=1&item_name1=Product name&item_quantity1=1&item_amount1=2000&item_url1=http://nganluong.vn/"	;
        //echo $post_field;
        //die;
        $nl_result = $this->CheckoutCall($post_field);

        return $nl_result;
    }

    function BankOfflineCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'ATM_OFFLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code' => $bank_code, //Mã Ngân hàng
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items)
        );

        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }
        //$post_field="function=SetExpressCheckout&version=3.1&merchant_id=24338&receiver_email=payment@hellochao.com&merchant_password=5b39df2b8f3275d1c8d1ea982b51b775&order_code=macode_oerder123&total_amount=2000&payment_method=ATM_ONLINE&bank_code=ICB&payment_type=&order_description=&tax_amount=0&fee_shipping=0&discount_amount=0&return_url=http://localhost/testcode/nganluong.vn/checkoutv3/payment_success.php&cancel_url=http://nganluong.vn&buyer_fullname=Test&buyer_email=saritvn@gmail.com&buyer_mobile=0909224002&buyer_address=&total_item=1&item_name1=Product name&item_quantity1=1&item_amount1=2000&item_url1=http://nganluong.vn/"	;
        //echo $post_field;
        //die;
        $nl_result = $this->CheckoutCall($post_field);

        return $nl_result;
    }

    function officeBankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'NH_OFFLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code' => $bank_code, //Mã Ngân hàng
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items)
        );

        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }
        //$post_field="function=SetExpressCheckout&version=3.1&merchant_id=24338&receiver_email=payment@hellochao.com&merchant_password=5b39df2b8f3275d1c8d1ea982b51b775&order_code=macode_oerder123&total_amount=2000&payment_method=ATM_ONLINE&bank_code=ICB&payment_type=&order_description=&tax_amount=0&fee_shipping=0&discount_amount=0&return_url=http://localhost/testcode/nganluong.vn/checkoutv3/payment_success.php&cancel_url=http://nganluong.vn&buyer_fullname=Test&buyer_email=saritvn@gmail.com&buyer_mobile=0909224002&buyer_address=&total_item=1&item_name1=Product name&item_quantity1=1&item_amount1=2000&item_url1=http://nganluong.vn/"	;
        //echo $post_field;
        //die;
        $nl_result = $this->CheckoutCall($post_field);

        return $nl_result;
    }

    /*

      Hàm lấy link thanh toán tại văn phòng ngân lượng

      ===============================
      Tham số truyền vào bắt buộc phải có
      order_code
      total_amount
      bank_code // HN hoặc HCM

      buyer_fullname
      buyer_email
      buyer_mobile
      ===============================

      $array_items mảng danh sách các item name theo quy tắc
      item_name1
      item_quantity1
      item_amount1
      item_url1
      .....
      payment_type Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn

     */

    function TTVPCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'ATM_ONLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code' => $bank_code, //Mã Ngân hàng
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items)
        );

        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }

        $nl_result = $this->CheckoutCall($post_field);
        return $nl_result;
    }

    /*

      Hàm lấy link thanh toán dùng số dư ví ngân lượng
      ===============================
      Tham số truyền vào bắt buộc phải có
      order_code
      total_amount
      payment_method

      buyer_fullname
      buyer_email
      buyer_mobile
      ===============================
      $array_items mảng danh sách các item name theo quy tắc
      item_name1
      item_quantity1
      item_amount1
      item_url1
      .....

      payment_type Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
     */

    function NLCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'NL', //Phương thức thanh toán
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items) //Tổng số sản phẩm trong đơn hàng
        );
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }

        //die($post_field);
        $nl_result = $this->CheckoutCall($post_field);
        return $nl_result;
    }

    function IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'IB_ONLINE', //Phương thức thanh toán
            'bank_code' => $bank_code,
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items) //Tổng số sản phẩm trong đơn hàng
        );
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }

        //die($post_field);
        $nl_result = $this->CheckoutCall($post_field);
        return $nl_result;
    }

    function CheckoutCall($post_field) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        if ($result != '' && $status == 200) {
            $xml_result = str_replace('&', '&amp;', (string) $result);
            $nl_result = simplexml_load_string($xml_result);
            $nl_result->error_message = $this->GetErrorMessage($nl_result->error_code);
        } else
            $nl_result->error_message = $error;
        return $nl_result;
    }

    function GetErrorMessage($error_code) {
        $arrCode = array(
            '00' => 'Thành công',
            '99' => 'Lỗi chưa xác minh',
            '06' => 'Mã merchant không tồn tại hoặc bị khóa',
            '02' => 'Địa chỉ IP truy cập bị từ chối',
            '03' => 'Mã checksum không chính xác, truy cập bị từ chối',
            '04' => 'Tên hàm API do merchant gọi tới không hợp lệ (không tồn tại)',
            '05' => 'Sai version của API',
            '07' => 'Sai mật khẩu của merchant',
            '08' => 'Địa chỉ email tài khoản nhận tiền không tồn tại',
            '09' => 'Tài khoản nhận tiền đang bị phong tỏa giao dịch',
            '10' => 'Mã đơn hàng không hợp lệ',
            '11' => 'Số tiền giao dịch lớn hơn hoặc nhỏ hơn quy định',
            '12' => 'Loại tiền tệ không hợp lệ',
            '29' => 'Token không tồn tại',
            '80' => 'Không thêm được đơn hàng',
            '81' => 'Đơn hàng chưa được thanh toán',
            '110' => 'Địa chỉ email tài khoản nhận tiền không phải email chính',
            '111' => 'Tài khoản nhận tiền đang bị khóa',
            '113' => 'Tài khoản nhận tiền chưa cấu hình là người bán nội dung số',
            '114' => 'Giao dịch đang thực hiện, chưa kết thúc',
            '115' => 'Giao dịch bị hủy',
            '118' => 'tax_amount không hợp lệ',
            '119' => 'discount_amount không hợp lệ',
            '120' => 'fee_shipping không hợp lệ',
            '121' => 'return_url không hợp lệ',
            '122' => 'cancel_url không hợp lệ',
            '123' => 'items không hợp lệ',
            '124' => 'transaction_info không hợp lệ',
            '125' => 'quantity không hợp lệ',
            '126' => 'order_description không hợp lệ',
            '127' => 'affiliate_code không hợp lệ',
            '128' => 'time_limit không hợp lệ',
            '129' => 'buyer_fullname không hợp lệ',
            '130' => 'buyer_email không hợp lệ',
            '131' => 'buyer_mobile không hợp lệ',
            '132' => 'buyer_address không hợp lệ',
            '133' => 'total_item không hợp lệ',
            '134' => 'payment_method, bank_code không hợp lệ',
            '135' => 'Lỗi kết nối tới hệ thống ngân hàng',
            '140' => 'Đơn hàng không hỗ trợ thanh toán trả góp',);

        return $arrCode[(string) $error_code];
    }

}

