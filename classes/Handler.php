<?php

/** @noinspection PhpIncludeInspection */
require_once 'block_io-php/lib/block_io.php';
include_once 'Session.php';


class Handler
{

    /** @var $block_io BlockIo */
    private $block_io;

    /**
     * Handler constructor.
     */
    public function __construct($apiKey, $pin, $version = 2)
    {
        $this->block_io = new BlockIo($apiKey, $pin, $version);
    }


    /**Get Balance
     * @return mixed
     */
    public function getBalance()
    {//Get balance


        $balance = $this->block_io->get_balance(array());
        return $balance->data->available_balance;

    }

    /**Create new address
     *
     */
    public function setAddress()
    {
        try {
            if (!empty($_POST['input_newAddress'])) {
                $this->block_io->get_new_address(array('label' => $_POST['input_newAddress']));///create new address, input label}

            } else {
                $this->block_io->get_new_address(array());///create new address, random label}
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }


    /**
     * Create Address table
     */
    public function getAddressed()
    {
        $addressed = $this->block_io->get_my_addresses(array());
        $add = $addressed->data->addresses;
        $network = $addressed->data->network;
        echo "<h2>".$network."</h2>";


        echo "<table class='table table-striped table-hover'><tr>
    <th>id</th>
    <th>label</th>
    <th>key</th>
    <th>amount</th>
    <th>qr code</th>
</tr>";
        foreach ($add as $address) {
            $qr = $this->generateQR($address->address, $size = "80x80", $option = "utf-8", $titel = "QR");

            echo "<tr>
                    <td>" . $address->user_id . "</td>
                    <td>" . $address->label . "</td>
                    <td>" . $address->address . "</td>
                    <td>" . $address->available_balance . "</td><td>";
                    echo $qr;
            echo"</td> </tr>";

        }
        echo "</table>";


    }

    /** Generate QR code
     * @param $address string Enter address
     * @param $size string Enter size for QR img
     * @return string
     */
    private function generateQR($address, $size)
    {
        return "<img src='https://chart.googleapis.com/chart?chs=" . $size . "&cht=qr&chl=" . $address . "'>";
    }

    /** Send BT to Address
     * @param $block_io
     * @param $ammounts string
     * @param $fromAddress string
     * @param $toAddress string
     * @param $pin string
     */
    public function sendBT($ammounts, $fromAddress, $toAddress, $pin)
    {
        try {
            $this->block_io->withdraw_from_addresses(array('amounts' => $ammounts, 'from_addresses' => $fromAddress, 'to_addresses' => $toAddress, 'pin' => $pin));
            echo 'Send BT Compliate!';
        } catch (Exception $e) {
            echo "Error filling fields";
        }

    }

    /**
     *Create selector
     */
    public function  coin_selector()
    {


        echo "<select method='POST' action=login.php name = 'coin'>";
        echo "<option value = " . Session::BITCOINTESTNET . " </option>" . Session::BITCOINTESTNET;
        echo "<option value = " . Session::BITCOIN . " </option>" . Session::BITCOIN;
        echo "<option value = " . Session::DOGECOINTESTNET . " </option>" . Session::DOGECOINTESTNET;
        echo "<option value = " . Session::DOGECOIN . " </option>" . Session::DOGECOIN;
        echo "<option value = " . Session::LITECOIN . " </option>" . Session::LITECOIN;
        echo "<option value = " . Session::LITECOINTESTNET . " </option>" . Session::LITECOINTESTNET;
        echo " <input type='submit' name='btn_select_coin' value='Send' class='btn btn-default'>";
        echo "</p>";
        echo "</select>";
    }
}