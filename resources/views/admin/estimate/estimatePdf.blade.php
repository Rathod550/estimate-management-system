<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.header{
			width: 100%;
		}
		.header-logo{
			float: left;
			width: 10%;
		}
		.company-name{
			float: left;
			width: 90%;
		}
		.company-name p{
			margin-left:26% ;
			font-size: 20px;
		}
		.tax-invoice{
			width: 100%;
			margin-top: 80px;
		}
		.bill{
			float: left;
			width: 50%;
			text-align: left;
		}
		.date{
			float: left;
			width: 50%;
			text-align: right;
		}
		.client{
			width: 100%;
			margin-top: 3px;
		}
		.client-name{
			float: left;
			width: 50%;
			text-align: left;
		}
		.client-gst{
			float: left;
			width: 50%;
			text-align: right;
		}
		.address{
			width: 50%;
		}
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
		.table{
			margin-top: 5px;
			width: 100%;
		}
		.gstin{
			width: 50%;
			float: left;
			text-align: left;
		}
		.udyam{
			width: 50%;
			float: left;
			text-align: right;
		}
		.pan{
			width: 50%;
			float: left;
			text-align: left;
		}
		.msme{
			width: 50%;
			float: left;
			text-align: right;
		}
		.bank{
			width: 50%;
			float: left;
			text-align: left;
		}
		.qr{
			width: 50%;
			float: left;
			text-align: right;
		}
	</style>
</head>
<body>
	<div class="header">
		<p style="float:right;">Original for Recipient</p>
		<div class="header-logo">
			<img width="75" height="35" src="data:image/jpg;base64,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"/ style="margin-top: 25px;">
		</div>
		<div class="company-name">
			<p>
				<strong>Kaushal Dave and Associates</strong> <br>
				<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chartered Accountants</small>	
			</p>
		</div>
	</div>
	<div class="tax-invoice">
		<center><h4>TAX - INVOICE</h4></center>
	</div>
	<div class="bill-date">
		<div class="bill">
			Bill No : KDA-{{ $estimate->id }}
		</div>
		<div class="date">
			Date : {{ date('d/m/Y') }}
		</div>
	</div>
	<br>
	<div class="client">
		<div class="client-name">
			<strong>M/s.</strong> : {{ $estimate->client->name ?? 'N/A' }}
		</div>
		<div class="client-gst">
			<strong>GSTIN</strong> : {{ $estimate->client->gst_number ?? 'N/A' }}
		</div>
	</div>
	<br>
	<div class="address">
		<strong>Address</strong> : {{ $estimate->client->address ?? 'N/A' }}
	</div>
	<br>
	<div>
		<strong>Service Name</strong> : {{ $estimate->service->name ?? 'N/A' }}
	</div>
	<br>
	<div class="table">
		<table width="100%">
		  <tr>
		    <th>Sr.No.</th>
		    <th>Particulars of Services</th>
		    <th>Net Amount (Rs.)</th>
		  </tr>
			@if(!empty($estimate))
		        @php
		            $serviceContent = json_decode($estimate->service_content);
		        @endphp
		        @if(!empty($serviceContent))
		            @foreach($serviceContent as $key => $value)
						<tr>
							<td width="5%">{{ ++$key }}</td>
							<td> &nbsp; {{ $value->name ?? '' }}</td>
							<td width="20%" style="text-align: right;">{{ $value->price ?? '' }} &nbsp;</td>
						</tr>
		            @endforeach
		        @endif
		    @endif
		    @if(!empty($estimate->gst) && !empty($estimate->sgst))
			    <tr>
					<td width="5%"></td>
					<td style="text-align: right;"><strong>CGST  @ 9%</strong> &nbsp;</td>
					<td width="20%" style="text-align: right;">{{ $estimate->gst ?? '' }} &nbsp;</td>
				</tr>
				<tr>
					<td width="5%"></td>
					<td style="text-align: right;"><strong>SGST  @ 9%</strong> &nbsp;</td>
					<td width="20%" style="text-align: right;">{{ $estimate->sgst ?? '' }} &nbsp;</td>
				</tr>
		    @endif
		    <tr>
				<td width="5%"></td>
				<td style="text-align: right;"><strong>Total Amount</strong> &nbsp;</td>
				<td width="20%" style="text-align: right;"><strong>{{ $estimate->total_price ?? '' }}</strong> &nbsp;</td>
			</tr>
		</table>
	</div>
	<br>
	<div style="width:100%;">
		<div class="gstin">
			GSTIN : 24AAWFK2277P1ZG
		</div>
		<div class="udyam">
			Udyam No : UDYAM-GJ-20-0087083
		</div>
	</div>
	<br>
	<div style="width:100%; margin-top:1px ;">
		<div class="pan">
			PAN : AAWFK2277P
		</div>
		<div class="msme">
			MSME : Micro
		</div>
	</div>
	<br>
	<div style="width:100%; margin-top:20px ;">
		<div class="bank">
			<p><strong>Bank Details</strong></p>
			<span><strong>Account Name</strong> : Kaushal Dave and Associates Bank: HDFC Bank Limited</span><br>
			<span><strong>Branch</strong> : Laxminagar</span><br>
			<span><strong>Bank A/c. No.</strong> : 50200080698895</span><br>
			<span><strong>IFSC Code</strong> : HDFC0001696</span>
		</div>
		<div class="qr">
			<img width="108" height="96" src="data:image/jpg;base64,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"/ style="margin-top:50px ;">
		</div>
	</div>

</body>
</html>