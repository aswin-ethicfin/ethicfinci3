<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZatcaInvoice {

    // Function to generate invoice XML
   
    public function generateInvoice($invoiceData) {
        // Create XML document using a library (e.g., SimpleXML, DOMDocument)
        $xml1 = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2"></Invoice>');

        // Populate XML elements with invoice data based on UBL 2.1 schema and ZATCA requirements
		
		$xml2 = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2" xmlns:sig="urn:oasis:names:specification:ubl:schema:xsd:CommonSignatureComponents-2" xmlns:sac="urn:oasis:names:specification:ubl:schema:xsd:SignatureAggregateComponents-2" xmlns:sbc="urn:oasis:names:specification:ubl:schema:xsd:SignatureBasicComponents-2" xmlns:ds="http://www.w3.org/2000/09/xmldsig#"></Invoice>');
		
		$xml5 = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2"></Invoice>');
		
		
		
		
		
		
		$xmlString = <<<XML
<Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:ext="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionURI>urn:oasis:names:specification:ubl:dsig:enveloped:xades</ext:ExtensionURI>
            <ext:ExtensionContent>
                <sig:UBLDocumentSignatures xmlns:sig="urn:oasis:names:specification:ubl:schema:xsd:CommonSignatureComponents-2" xmlns:sac="urn:oasis:names:specification:ubl:schema:xsd:SignatureAggregateComponents-2" xmlns:sbc="urn:oasis:names:specification:ubl:schema:xsd:SignatureBasicComponents-2">
                    <sac:SignatureInformation>
                        <cbc:ID>urn:oasis:names:specification:ubl:signature:1</cbc:ID>
                        <sbc:ReferencedSignatureID>urn:oasis:names:specification:ubl:signature:Invoice</sbc:ReferencedSignatureID>
                        <ds:Signature xmlns:ds="http://www.w3.org/2000/09/xmldsig#" Id="signature">
                            <ds:SignedInfo>
                                <ds:CanonicalizationMethod Algorithm="http://www.w3.org/2006/12/xml-c14n11"/>
                                <ds:SignatureMethod Algorithm="http://www.w3.org/2001/04/xmldsig-more#ecdsa-sha256"/>
                                <ds:Reference Id="invoiceSignedData" URI="">
                                    <ds:Transforms>
                                        <ds:Transform Algorithm="http://www.w3.org/TR/1999/REC-xpath-19991116">
                                            <ds:XPath>not(//ancestor-or-self::ext:UBLExtensions)</ds:XPath>
                                        </ds:Transform>
                                        <ds:Transform Algorithm="http://www.w3.org/TR/1999/REC-xpath-19991116">
                                            <ds:XPath>not(//ancestor-or-self::cac:Signature)</ds:XPath>
                                        </ds:Transform>
                                        <ds:Transform Algorithm="http://www.w3.org/TR/1999/REC-xpath-19991116">
                                            <ds:XPath>not(//ancestor-or-self::cac:AdditionalDocumentReference[cbc:ID='QR'])</ds:XPath>
                                        </ds:Transform>
                                        <ds:Transform Algorithm="http://www.w3.org/2006/12/xml-c14n11"/>
                                    </ds:Transforms>
                                    <ds:DigestMethod Algorithm="http://www.w3.org/2001/04/xmlenc#sha256"/>
                                    <ds:DigestValue>f+0WCqnPkInI+eL9G3LAry12fTPf+toC9UX07F4fI+s=</ds:DigestValue>
                                </ds:Reference>
                                <ds:Reference Type="http://www.w3.org/2000/09/xmldsig#SignatureProperties" URI="#xadesSignedProperties">
                                    <ds:DigestMethod Algorithm="http://www.w3.org/2001/04/xmlenc#sha256"/>
                                    <ds:DigestValue>ODQwNTg1NTBhMjMzM2YxY2ZkZjVkYzdlNTZiZjY0ODJjMjNkYWI4MTUzNjdmNDVjMjAwZTBjODc2YTNhMWQ1Ng==</ds:DigestValue>
                                </ds:Reference>
                            </ds:SignedInfo>
                            <ds:SignatureValue>MEUCIBxyR8rc4K8728wdSF4XSDqPs+rIL+3TFh9m+aNxQPtSAiEA6cHapItvp13yMSu66NbOg2CpomHwUSnYJ9h6uGQ65aY=</ds:SignatureValue>
                            <ds:KeyInfo>
                                <ds:X509Data>
                                    <ds:X509Certificate>MIID3jCCA4SgAwIBAgITEQAAOAPF90Ajs/xcXwABAAA4AzAKBggqhkjOPQQDAjBiMRUwEwYKCZImiZPyLGQBGRYFbG9jYWwxEzARBgoJkiaJk/IsZAEZFgNnb3YxFzAVBgoJkiaJk/IsZAEZFgdleHRnYXp0MRswGQYDVQQDExJQUlpFSU5WT0lDRVNDQTQtQ0EwHhcNMjQwMTExMDkxOTMwWhcNMjkwMTA5MDkxOTMwWjB1MQswCQYDVQQGEwJTQTEmMCQGA1UEChMdTWF4aW11bSBTcGVlZCBUZWNoIFN1cHBseSBMVEQxFjAUBgNVBAsTDVJpeWFkaCBCcmFuY2gxJjAkBgNVBAMTHVRTVC04ODY0MzExNDUtMzk5OTk5OTk5OTAwMDAzMFYwEAYHKoZIzj0CAQYFK4EEAAoDQgAEoWCKa0Sa9FIErTOv0uAkC1VIKXxU9nPpx2vlf4yhMejy8c02XJblDq7tPydo8mq0ahOMmNo8gwni7Xt1KT9UeKOCAgcwggIDMIGtBgNVHREEgaUwgaKkgZ8wgZwxOzA5BgNVBAQMMjEtVFNUfDItVFNUfDMtZWQyMmYxZDgtZTZhMi0xMTE4LTliNTgtZDlhOGYxMWU0NDVmMR8wHQYKCZImiZPyLGQBAQwPMzk5OTk5OTk5OTAwMDAzMQ0wCwYDVQQMDAQxMTAwMREwDwYDVQQaDAhSUlJEMjkyOTEaMBgGA1UEDwwRU3VwcGx5IGFjdGl2aXRpZXMwHQYDVR0OBBYEFEX+YvmmtnYoDf9BGbKo7ocTKYK1MB8GA1UdIwQYMBaAFJvKqqLtmqwskIFzVvpP2PxT+9NnMHsGCCsGAQUFBwEBBG8wbTBrBggrBgEFBQcwAoZfaHR0cDovL2FpYTQuemF0Y2EuZ292LnNhL0NlcnRFbnJvbGwvUFJaRUludm9pY2VTQ0E0LmV4dGdhenQuZ292LmxvY2FsX1BSWkVJTlZPSUNFU0NBNC1DQSgxKS5jcnQwDgYDVR0PAQH/BAQDAgeAMDwGCSsGAQQBgjcVBwQvMC0GJSsGAQQBgjcVCIGGqB2E0PsShu2dJIfO+xnTwFVmh/qlZYXZhD4CAWQCARIwHQYDVR0lBBYwFAYIKwYBBQUHAwMGCCsGAQUFBwMCMCcGCSsGAQQBgjcVCgQaMBgwCgYIKwYBBQUHAwMwCgYIKwYBBQUHAwIwCgYIKoZIzj0EAwIDSAAwRQIhALE/ichmnWXCUKUbca3yci8oqwaLvFdHVjQrveI9uqAbAiA9hC4M8jgMBADPSzmd2uiPJA6gKR3LE03U75eqbC/rXA==</ds:X509Certificate>
                                </ds:X509Data>
                            </ds:KeyInfo>
                            <ds:Object>
                                <xades:QualifyingProperties xmlns:xades="http://uri.etsi.org/01903/v1.3.2#" Target="signature">
                                    <xades:SignedProperties Id="xadesSignedProperties">
                                        <xades:SignedSignatureProperties>
                                            <xades:SigningTime>2024-01-14T10:21:40</xades:SigningTime>
                                            <xades:SigningCertificate>
                                                <xades:Cert>
                                                    <xades:CertDigest>
                                                        <ds:DigestMethod Algorithm="http://www.w3.org/2001/04/xmlenc#sha256"/>
                                                        <ds:DigestValue>ZDMwMmI0MTE1NzVjOTU2NTk4YzVlODhhYmI0ODU2NDUyNTU2YTVhYjhhMDFmN2FjYjk1YTA2OWQ0NjY2MjQ4NQ==</ds:DigestValue>
                                                    </xades:CertDigest>
                                                    <xades:IssuerSerial>
                                                        <ds:X509IssuerName>CN=PRZEINVOICESCA4-CA, DC=extgazt, DC=gov, DC=local</ds:X509IssuerName>
                                                        <ds:X509SerialNumber>379112742831380471835263969587287663520528387</ds:X509SerialNumber>
                                                    </xades:IssuerSerial>
                                                </xades:Cert>
                                            </xades:SigningCertificate>
                                        </xades:SignedSignatureProperties>
                                    </xades:SignedProperties>
                                </xades:QualifyingProperties>
                            </ds:Object>
                        </ds:Signature>
                    </sac:SignatureInformation>
                </sig:UBLDocumentSignatures>
            </ext:ExtensionContent>
        </ext:UBLExtension>
    </ext:UBLExtensions>
</Invoice>
XML;

// Load the static XML string into a SimpleXMLElement object
$xml = new SimpleXMLElement($xmlString);
		
		
		
		
        $this->populateInvoiceElements($xml, $invoiceData);

        // Return the generated XML as a string
        return $xml->asXML();
    }

    // Function to populate XML elements


private function populateInvoiceElements($xml, $invoiceData) {
	
	
	
	
	
	
    // Add other elements
    $xml->addChild('cbc:ProfileID', $invoiceData['profileID'], 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $xml->addChild('cbc:ID', $invoiceData['ID'], 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $xml->addChild('cbc:UUID', $invoiceData['UUID'], 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $xml->addChild('cbc:IssueDate', $invoiceData['issueDate'], 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $xml->addChild('cbc:IssueTime', $invoiceData['issueTime'], 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $invoiceTypeCode = $xml->addChild('cbc:InvoiceTypeCode', $invoiceData['invoiceTypeCode'], 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $invoiceTypeCode->addAttribute('name', '0100000');
    $xml->addChild('cbc:DocumentCurrencyCode', $invoiceData['documentCurrencyCode'], 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $xml->addChild('cbc:TaxCurrencyCode', $invoiceData['taxCurrencyCode'], 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

    // Add AdditionalDocumentReference
    $additionalDocRef = $xml->addChild('cac:AdditionalDocumentReference', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $additionalDocRef->addChild('cbc:ID', 'ICV', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $additionalDocRef->addChild('cbc:UUID', '23', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

    $additionalDocRef = $xml->addChild('cac:AdditionalDocumentReference', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $additionalDocRef->addChild('cbc:ID', 'PIH', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $attachment = $additionalDocRef->addChild('cac:Attachment', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $attachment->addChild('cbc:EmbeddedDocumentBinaryObject', 'NWZlY2ViNjZmZmM4NmYzOGQ5NTI3ODZjNmQ2OTZjNzljMmRiYzIzOWRkNGU5MWI0NjcyOWQ3M2EyN2ZiNTdlOQ==', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('mimeCode', 'text/plain');

	
	
	
	
	// Add cac:AdditionalDocumentReference element
$additionalDocumentReference = $xml->addChild('cac:AdditionalDocumentReference', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$additionalDocumentReference->addChild('cbc:ID', 'QR', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:Attachment element under cac:AdditionalDocumentReference
$attachment = $additionalDocumentReference->addChild('cac:Attachment', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$embeddedDocumentBinaryObject = $attachment->addChild('cbc:EmbeddedDocumentBinaryObject', 'AW/YtNix2YPYqSDYqtmI2LHZitivINin2YTYqtmD2YbZiNmE2YjYrNmK2Kcg2KjYo9mC2LXZiSDYs9ix2LnYqSDYp9mE2YXYrdiv2YjYr9ipIHwgTWF4aW11bSBTcGVlZCBUZWNoIFN1cHBseSBMVEQCDzM5OTk5OTk5OTkwMDAwMwMTMjAyMi0wOS0wN1QxMjoyMToyOAQENC42MAUDMC42BixmKzBXQ3FuUGtJbkkrZUw5RzNMQXJ5MTJmVFBmK3RvQzlVWDA3RjRmSStzPQdgTUVVQ0lCeHlSOHJjNEs4NzI4d2RTRjRYU0RxUHMrcklMKzNURmg5bSthTnhRUHRTQWlFQTZjSGFwSXR2cDEzeU1TdTY2TmJPZzJDcG9tSHdVU25ZSjloNnVHUTY1YVk9CFgwVjAQBgcqhkjOPQIBBgUrgQQACgNCAAShYIprRJr0UgStM6/S4CQLVUgpfFT2c+nHa+V/jKEx6PLxzTZcluUOru0/J2jyarRqE4yY2jyDCeLte3UpP1R4', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$embeddedDocumentBinaryObject->addAttribute('mimeCode', 'text/plain');

// Add cac:Signature element
$signature = $xml->addChild('cac:Signature', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$signature->addChild('cbc:ID', 'urn:oasis:names:specification:ubl:signature:Invoice', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$signature->addChild('cbc:SignatureMethod', 'urn:oasis:names:specification:ubl:dsig:enveloped:xades', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Add cac:AccountingSupplierParty element
$accountingSupplierParty = $xml->addChild('cac:AccountingSupplierParty', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');

// Add cac:Party element under cac:AccountingSupplierParty
$party = $accountingSupplierParty->addChild('cac:Party', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');

// Add cac:PartyIdentification element under cac:Party
$partyIdentification = $party->addChild('cac:PartyIdentification', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$id = $partyIdentification->addChild('cbc:ID', '1010010000', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$id->addAttribute('schemeID', 'CRN');

// Add cac:PostalAddress element under cac:Party
$postalAddress = $party->addChild('cac:PostalAddress', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$postalAddress->addChild('cbc:StreetName', 'الامير سلطان | Prince Sultan', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$postalAddress->addChild('cbc:BuildingNumber', '2322', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$postalAddress->addChild('cbc:CitySubdivisionName', 'المربع | Al-Murabba', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$postalAddress->addChild('cbc:CityName', 'الرياض | Riyadh', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$postalAddress->addChild('cbc:PostalZone', '23333', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:Country element under cac:PostalAddress
$country = $postalAddress->addChild('cac:Country', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$country->addChild('cbc:IdentificationCode', 'SA', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:PartyTaxScheme element under cac:Party
$partyTaxScheme = $party->addChild('cac:PartyTaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$partyTaxScheme->addChild('cbc:CompanyID', '399999999900003', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:TaxScheme element under cac:PartyTaxScheme
$taxScheme = $partyTaxScheme->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:PartyLegalEntity element under cac:Party
$partyLegalEntity = $party->addChild('cac:PartyLegalEntity', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$partyLegalEntity->addChild('cbc:RegistrationName', 'شركة توريد التكنولوجيا بأقصى سرعة المحدودة | Maximum Speed Tech Supply LTD', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Add cac:AccountingCustomerParty element
$accountingCustomerParty = $xml->addChild('cac:AccountingCustomerParty', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');

// Add cac:Party element under cac:AccountingCustomerParty
$party = $accountingCustomerParty->addChild('cac:Party', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');

// Add cac:PostalAddress element under cac:Party
$postalAddress = $party->addChild('cac:PostalAddress', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$postalAddress->addChild('cbc:StreetName', 'صلاح الدين | Salah Al-Din', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$postalAddress->addChild('cbc:BuildingNumber', '1111', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$postalAddress->addChild('cbc:CitySubdivisionName', 'المروج | Al-Murooj', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$postalAddress->addChild('cbc:CityName', 'الرياض | Riyadh', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
$postalAddress->addChild('cbc:PostalZone', '12222', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:Country element under cac:PostalAddress
$country = $postalAddress->addChild('cac:Country', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$country->addChild('cbc:IdentificationCode', 'SA', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:PartyTaxScheme element under cac:Party
$partyTaxScheme = $party->addChild('cac:PartyTaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$partyTaxScheme->addChild('cbc:CompanyID', '399999999800003', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:TaxScheme element under cac:PartyTaxScheme
$taxScheme = $partyTaxScheme->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:PartyLegalEntity element under cac:Party
$partyLegalEntity = $party->addChild('cac:PartyLegalEntity', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$partyLegalEntity->addChild('cbc:RegistrationName', 'شركة نماذج فاتورة المحدودة | Fatoora Samples LTD', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

	
	
	
	
	
	
	
	
	
	// Add cac:Delivery element
$delivery = $xml->addChild('cac:Delivery', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$actualDeliveryDate = $delivery->addChild('cbc:ActualDeliveryDate', '2022-09-07', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Add cac:PaymentMeans element
$paymentMeans = $xml->addChild('cac:PaymentMeans', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
$paymentMeansCode = $paymentMeans->addChild('cbc:PaymentMeansCode', '10', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

	
	
	
	
	
	 // Add AllowanceCharge
    $allowanceCharge = $xml->addChild('cac:AllowanceCharge', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $chargeIndicator = $allowanceCharge->addChild('cbc:ChargeIndicator', 'false', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $allowanceChargeReason = $allowanceCharge->addChild('cbc:AllowanceChargeReason', 'discount', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $amount = $allowanceCharge->addChild('cbc:Amount', '0.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $amount->addAttribute('currencyID', $invoiceData['documentCurrencyCode']);

    // Add TaxCategory under AllowanceCharge
    $taxCategory = $allowanceCharge->addChild('cac:TaxCategory', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $id = $taxCategory->addChild('cbc:ID', 'S', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $id->addAttribute('schemeID', 'UN/ECE 5305');
    $id->addAttribute('schemeAgencyID', '6');
    $percent = $taxCategory->addChild('cbc:Percent', '15', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

    // Add TaxScheme under TaxCategory
    $taxScheme = $taxCategory->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $id = $taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $id->addAttribute('schemeID', 'UN/ECE 5153');
    $id->addAttribute('schemeAgencyID', '6');

    // Add TaxTotal
    $taxTotal = $xml->addChild('cac:TaxTotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $taxAmount = $taxTotal->addChild('cbc:TaxAmount', '0.6', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $taxAmount->addAttribute('currencyID', $invoiceData['documentCurrencyCode']);

	
	
	
	
	
	
	
	
	
	
	// Add cac:TaxTotal
	
	 $taxTotal = $xml->addChild('cac:TaxTotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $taxAmount = $taxTotal->addChild('cbc:TaxAmount', '0.60', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $taxAmount->addAttribute('currencyID', 'SAR');
    
    // Add cac:TaxSubtotal
    $taxSubtotal = $taxTotal->addChild('cac:TaxSubtotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $taxableAmount = $taxSubtotal->addChild('cbc:TaxableAmount', '4.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $taxableAmount->addAttribute('currencyID', 'SAR');
    $taxAmount = $taxSubtotal->addChild('cbc:TaxAmount', '0.60', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $taxAmount->addAttribute('currencyID', 'SAR');
    
    // Add cac:TaxCategory
    $taxCategory = $taxSubtotal->addChild('cac:TaxCategory', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $id = $taxCategory->addChild('cbc:ID', 'S', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $id->addAttribute('schemeID', 'UN/ECE 5305');
    $id->addAttribute('schemeAgencyID', '6');
    $percent = $taxCategory->addChild('cbc:Percent', '15.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $taxScheme = $taxCategory->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $id = $taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $id->addAttribute('schemeID', 'UN/ECE 5153');
    $id->addAttribute('schemeAgencyID', '6');
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	   // Add cac:LegalMonetaryTotal
    $legalMonetaryTotal = $xml->addChild('cac:LegalMonetaryTotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $legalMonetaryTotal->addChild('cbc:LineExtensionAmount', '4.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    $legalMonetaryTotal->addChild('cbc:TaxExclusiveAmount', '4.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    $legalMonetaryTotal->addChild('cbc:TaxInclusiveAmount', '4.60', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    $legalMonetaryTotal->addChild('cbc:AllowanceTotalAmount', '0.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    $legalMonetaryTotal->addChild('cbc:PrepaidAmount', '0.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    $legalMonetaryTotal->addChild('cbc:PayableAmount', '4.60', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');

	
	
	
	
	
	
	
	
	
	
	
	
	
	
 // Add cac:InvoiceLine
    $invoiceLine = $xml->addChild('cac:InvoiceLine', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $invoiceLine->addChild('cbc:ID', '1', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $invoicedQuantity = $invoiceLine->addChild('cbc:InvoicedQuantity', '2.000000', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $invoicedQuantity->addAttribute('unitCode', 'PCE');
    $invoiceLine->addChild('cbc:LineExtensionAmount', '4.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    
    // Add cac:TaxTotal
    $taxTotal = $invoiceLine->addChild('cac:TaxTotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $taxTotal->addChild('cbc:TaxAmount', '0.60', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    $taxTotal->addChild('cbc:RoundingAmount', '4.60', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    
    // Add cac:Item
    $item = $invoiceLine->addChild('cac:Item', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $item->addChild('cbc:Name', 'قلم رصاص', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $classifiedTaxCategory = $item->addChild('cac:ClassifiedTaxCategory', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $classifiedTaxCategory->addChild('cbc:ID', 'S', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $classifiedTaxCategory->addChild('cbc:Percent', '15.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $taxScheme = $classifiedTaxCategory->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    
    // Add cac:Price
    $price = $invoiceLine->addChild('cac:Price', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $price->addChild('cbc:PriceAmount', '2.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    $allowanceCharge = $price->addChild('cac:AllowanceCharge', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
    $allowanceCharge->addChild('cbc:ChargeIndicator', 'true', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $allowanceCharge->addChild('cbc:AllowanceChargeReason', 'discount', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
    $allowanceCharge->addChild('cbc:Amount', '0.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'SAR');
    
	
	
	
    return $xml;
}


}
