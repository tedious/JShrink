function airplaneIsCarrierBased(model){return/^(FI-167|Swordfish|Fulmar|Firefly|F4F Wildcat|F6F-[35] Hellcat|Latécoère 298|A[567]M)$/.test(model)}
console.log(airplaneIsCarrierBased('F6F-5 Hellcat'))