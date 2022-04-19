<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weight slip</title>
</head>
<body>
<div>
    <table>
        <tbody>
        <tr>
            <td>
                <img src="<?php echo e(url('/images/logo.png')); ?>"
                     width="122" height="36" alt=""/>
            </td>
            <td>
                <span>
                    CÔNG TY CỔ PHẦN PHÁT TRIỂN CÔNG NGHỆ CYBERLOGISTICS VIỆT NAM
                </span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <span>CYBERLOGISTICS VIET NAM TECHNOLOGY DEVELOPMENT JOINT STOCK COMPANY</span>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div>
    <table style="width:800px">
        <tr style="height:10px">
            <td></td>
        </tr>
        <tr>
            <td style="text-align:center">
                <h2>PHIẾU CÂN HÀNG/<i>WEIGHT SLIP</i></h2>
            </td>
        </tr>
        <tr style="height:2px">
            <td></td>
        </tr>
    </table>
</div>
<div>
    <table style="width:800px;border-top: 2px solid #1a0f13;border-bottom: 2px solid #1a0f13;">
        <tbody>
        <colgroup>
            <col width="20%"/>
            <col width="30%"/>
            <col width="25%"/>
            <col width="25%"/>
        </colgroup>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Số phiếu/<i>SlipCode</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($Code); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Người cân/<i>TallyMan</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($UserWeighting); ?></span>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Số xe/<i>TruckPlate</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($VehicleCode); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Số Mooc/<i>ChassisPlate</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($VehicleMoocCode); ?></span>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Tầu/<i>Vessel</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($VesselCode); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Sà lan/<i>Barge</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($BargeCode); ?></span>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Hàng hóa/<i>Commodity</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($CargoName); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Loại hàng/<i>CargoType</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($CargoTypeText); ?></span>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Chủ hàng/<i>Consignee</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($ConsigneeCode); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Kho bãi/<i>Warehouse</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($WarehouseCode); ?></span>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Ủy thác/<i>Delegation</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($DelegateCode); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Hướng hàng/<i>Direction</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($CargoDirectCode); ?></span>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Trading:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($TradingCode); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span>Nơi giao hàng/<i>Terminal</i>:</span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($OperationTerminal); ?></span>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div>
    <table style="width:800px">
        <tbody>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><b>Trọng lượng cả bì/<i>GrossWeight</i>:</b></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($GrossWeight); ?></span> <i>(Kg)</i>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($GrossTime); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($GrossScaleCode); ?></span>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><b>Trọng lượng bì/<i>TareWeight</i>:</b></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($TareWeight); ?></span> <i>(Kg)</i>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($TareTime); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($TareScaleCode); ?></span>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><b>Trọng lượng hàng giao nhận/<i>NetWeight</i>:</b></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($NetWeight); ?></span> <i>(Kg)</i>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($NetTime); ?></span>
            </td>
            <td style="border-bottom: 1px dotted #ddd;padding:3px">
                <span><?php echo e($NetScaleCode); ?></span>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div>
    <table style="width:800px">
        <colgroup>
            <col width="60%"/>
            <col width="40%"/>
        </colgroup>
        <tbody>
        <tr>
            <td style="vertical-align:top">Ghi chú/<i>Remark</i>: <span><i><?php echo e($Remark); ?></i></span></td>
            <td>
                <table style="width:320px;border: 1px solid #1a0f13;">
                    <tbody>
                    <tr>
                        <th style="border-bottom: 1px solid #1a0f13;padding:5px">Khách hàng/<i>Customer</i></th>
                        <th style="border-bottom: 1px solid #1a0f13;padding:5px;border-left: 1px solid #1a0f13;">Nhân viên cân/<i>TallyMan</i></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-left: 1px solid #1a0f13;vertical-align:bottom;text-align:center;height:50px"><?php echo e($UserWeighting); ?></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div>
    <table style="width:800px">
        <tr>
            <td><i><?php echo e($DateCreate); ?></i></td>
        </tr>
    </table>
</div>
</body>
</html
<?php  ?>
