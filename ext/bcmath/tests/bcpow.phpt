--TEST--
bcpow() function
--EXTENSIONS--
bcmath
--INI--
bcmath.scale=0
--FILE--
<?php
require(__DIR__ . "/run_bcmath_tests_function.inc");

$exponents = ["15", "-15", "1", "-9", "0", "-0"];
$baseNumbers = array_merge($exponents, [
    "14.14",
    "-16.60",
    "0.15",
    "-0.01",
    "15151324141414.412312232141241",
    "141241241241241248267654747412",
    "-149143276547656984948124912",
    "-132132245132134.1515123765412",
    "0.1322135476547459213732911312",
    "-0.123912932193769965476541321",
]);

run_bcmath_tests($baseNumbers, $exponents, "**", bcpow(...));

?>
--EXPECT--
Number "15" (scale 0)
15 ** 15                             = 437893890380859375
15 ** -15                            = 0
15 ** 1                              = 15
15 ** -9                             = 0
15 ** 0                              = 1
15 ** -0                             = 1

Number "-15" (scale 0)
-15 ** 15                             = -437893890380859375
-15 ** -15                            = 0
-15 ** 1                              = -15
-15 ** -9                             = 0
-15 ** 0                              = 1
-15 ** -0                             = 1

Number "1" (scale 0)
1 ** 15                             = 1
1 ** -15                            = 1
1 ** 1                              = 1
1 ** -9                             = 1
1 ** 0                              = 1
1 ** -0                             = 1

Number "-9" (scale 0)
-9 ** 15                             = -205891132094649
-9 ** -15                            = 0
-9 ** 1                              = -9
-9 ** -9                             = 0
-9 ** 0                              = 1
-9 ** -0                             = 1

Number "0" (scale 0)
0 ** 15                             = 0
0 ** -15                            = 0
0 ** 1                              = 0
0 ** -9                             = 0
0 ** 0                              = 1
0 ** -0                             = 1

Number "-0" (scale 0)
-0 ** 15                             = 0
-0 ** -15                            = 0
-0 ** 1                              = 0
-0 ** -9                             = 0
-0 ** 0                              = 1
-0 ** -0                             = 1

Number "14.14" (scale 0)
14.14 ** 15                             = 180609729388653367
14.14 ** -15                            = 0
14.14 ** 1                              = 14
14.14 ** -9                             = 0
14.14 ** 0                              = 1
14.14 ** -0                             = 1

Number "-16.60" (scale 0)
-16.60 ** 15                             = -2002725006700243463
-16.60 ** -15                            = 0
-16.60 ** 1                              = -16
-16.60 ** -9                             = 0
-16.60 ** 0                              = 1
-16.60 ** -0                             = 1

Number "0.15" (scale 0)
0.15 ** 15                             = 0
0.15 ** -15                            = 2283658260521
0.15 ** 1                              = 0
0.15 ** -9                             = 26012294
0.15 ** 0                              = 1
0.15 ** -0                             = 1

Number "-0.01" (scale 0)
-0.01 ** 15                             = 0
-0.01 ** -15                            = -1000000000000000000000000000000
-0.01 ** 1                              = 0
-0.01 ** -9                             = -1000000000000000000
-0.01 ** 0                              = 1
-0.01 ** -0                             = 1

Number "15151324141414.412312232141241" (scale 0)
15151324141414.412312232141241 ** 15                             = 509048123991351801905481953476379185972789524506389464560948346272971876778908444213802402540123245924548973078757287880001162665191012187707496396738218203170247236816923480505943223846447785782345
15151324141414.412312232141241 ** -15                            = 0
15151324141414.412312232141241 ** 1                              = 15151324141414
15151324141414.412312232141241 ** -9                             = 0
15151324141414.412312232141241 ** 0                              = 1
15151324141414.412312232141241 ** -0                             = 1

Number "141241241241241248267654747412" (scale 0)
141241241241241248267654747412 ** 15                             = 177591789298838947421924937418435926483207726032941337126565686201154837989992676792469043927153886362407093561688979426718344848540943458245870720268722797084708626211824507010348223033844880992203548347580375252630658556528592298319547225224912135982081686378909626742998484437641863458021277126578238452879997277005795795020835662533892290564198652316605246272512413311084386660488961246461538425989780621930750572963428718487554490368
141241241241241248267654747412 ** -15                            = 0
141241241241241248267654747412 ** 1                              = 141241241241241248267654747412
141241241241241248267654747412 ** -9                             = 0
141241241241241248267654747412 ** 0                              = 1
141241241241241248267654747412 ** -0                             = 1

Number "-149143276547656984948124912" (scale 0)
-149143276547656984948124912 ** 15                             = -401841881822660241398409660309345646463535278187389488718526585893873800090729191609465595568674086078015487989884600849819723618141030735892646637579078630759905628572464757376301450900008605507116286859140901254928168279833198528761329808672095261265618307499605901098109261736293336298350347017449323858811047847238969925531775390894165290898723086447624518554747816961256145036283496890368
-149143276547656984948124912 ** -15                            = 0
-149143276547656984948124912 ** 1                              = -149143276547656984948124912
-149143276547656984948124912 ** -9                             = 0
-149143276547656984948124912 ** 0                              = 1
-149143276547656984948124912 ** -0                             = 1

Number "-132132245132134.1515123765412" (scale 0)
-132132245132134.1515123765412 ** 15                             = -65332942084431118671715132691017936828728297532817376297090067844431557352758338594306899592493441083845683845573112529065975725871957965764869599362286162979915656223771056616561461958797695558519631556073805440
-132132245132134.1515123765412 ** -15                            = 0
-132132245132134.1515123765412 ** 1                              = -132132245132134
-132132245132134.1515123765412 ** -9                             = 0
-132132245132134.1515123765412 ** 0                              = 1
-132132245132134.1515123765412 ** -0                             = 1

Number "0.1322135476547459213732911312" (scale 0)
0.1322135476547459213732911312 ** 15                             = 0
0.1322135476547459213732911312 ** -15                            = 15165635699683
0.1322135476547459213732911312 ** 1                              = 0
0.1322135476547459213732911312 ** -9                             = 81005847
0.1322135476547459213732911312 ** 0                              = 1
0.1322135476547459213732911312 ** -0                             = 1

Number "-0.123912932193769965476541321" (scale 0)
-0.123912932193769965476541321 ** 15                             = 0
-0.123912932193769965476541321 ** -15                            = -40109799462729
-0.123912932193769965476541321 ** 1                              = 0
-0.123912932193769965476541321 ** -9                             = -145194543
-0.123912932193769965476541321 ** 0                              = 1
-0.123912932193769965476541321 ** -0                             = 1

Number "15" (scale 10)
15 ** 15                             = 437893890380859375.0000000000
15 ** -15                            = 0.0000000000
15 ** 1                              = 15.0000000000
15 ** -9                             = 0.0000000000
15 ** 0                              = 1.0000000000
15 ** -0                             = 1.0000000000

Number "-15" (scale 10)
-15 ** 15                             = -437893890380859375.0000000000
-15 ** -15                            = 0.0000000000
-15 ** 1                              = -15.0000000000
-15 ** -9                             = 0.0000000000
-15 ** 0                              = 1.0000000000
-15 ** -0                             = 1.0000000000

Number "1" (scale 10)
1 ** 15                             = 1.0000000000
1 ** -15                            = 1.0000000000
1 ** 1                              = 1.0000000000
1 ** -9                             = 1.0000000000
1 ** 0                              = 1.0000000000
1 ** -0                             = 1.0000000000

Number "-9" (scale 10)
-9 ** 15                             = -205891132094649.0000000000
-9 ** -15                            = 0.0000000000
-9 ** 1                              = -9.0000000000
-9 ** -9                             = -0.0000000025
-9 ** 0                              = 1.0000000000
-9 ** -0                             = 1.0000000000

Number "0" (scale 10)
0 ** 15                             = 0.0000000000
0 ** -15                            = 0.0000000000
0 ** 1                              = 0.0000000000
0 ** -9                             = 0.0000000000
0 ** 0                              = 1.0000000000
0 ** -0                             = 1.0000000000

Number "-0" (scale 10)
-0 ** 15                             = 0.0000000000
-0 ** -15                            = 0.0000000000
-0 ** 1                              = 0.0000000000
-0 ** -9                             = 0.0000000000
-0 ** 0                              = 1.0000000000
-0 ** -0                             = 1.0000000000

Number "14.14" (scale 10)
14.14 ** 15                             = 180609729388653367.2586094856
14.14 ** -15                            = 0.0000000000
14.14 ** 1                              = 14.1400000000
14.14 ** -9                             = 0.0000000000
14.14 ** 0                              = 1.0000000000
14.14 ** -0                             = 1.0000000000

Number "-16.60" (scale 10)
-16.60 ** 15                             = -2002725006700243463.1471178615
-16.60 ** -15                            = 0.0000000000
-16.60 ** 1                              = -16.6000000000
-16.60 ** -9                             = 0.0000000000
-16.60 ** 0                              = 1.0000000000
-16.60 ** -0                             = 1.0000000000

Number "0.15" (scale 10)
0.15 ** 15                             = 0.0000000000
0.15 ** -15                            = 2283658260521.1672220051
0.15 ** 1                              = 0.1500000000
0.15 ** -9                             = 26012294.8737489203
0.15 ** 0                              = 1.0000000000
0.15 ** -0                             = 1.0000000000

Number "-0.01" (scale 10)
-0.01 ** 15                             = 0.0000000000
-0.01 ** -15                            = -1000000000000000000000000000000.0000000000
-0.01 ** 1                              = -0.0100000000
-0.01 ** -9                             = -1000000000000000000.0000000000
-0.01 ** 0                              = 1.0000000000
-0.01 ** -0                             = 1.0000000000

Number "15151324141414.412312232141241" (scale 10)
15151324141414.412312232141241 ** 15                             = 509048123991351801905481953476379185972789524506389464560948346272971876778908444213802402540123245924548973078757287880001162665191012187707496396738218203170247236816923480505943223846447785782345.3558894965
15151324141414.412312232141241 ** -15                            = 0.0000000000
15151324141414.412312232141241 ** 1                              = 15151324141414.4123122321
15151324141414.412312232141241 ** -9                             = 0.0000000000
15151324141414.412312232141241 ** 0                              = 1.0000000000
15151324141414.412312232141241 ** -0                             = 1.0000000000

Number "141241241241241248267654747412" (scale 10)
141241241241241248267654747412 ** 15                             = 177591789298838947421924937418435926483207726032941337126565686201154837989992676792469043927153886362407093561688979426718344848540943458245870720268722797084708626211824507010348223033844880992203548347580375252630658556528592298319547225224912135982081686378909626742998484437641863458021277126578238452879997277005795795020835662533892290564198652316605246272512413311084386660488961246461538425989780621930750572963428718487554490368.0000000000
141241241241241248267654747412 ** -15                            = 0.0000000000
141241241241241248267654747412 ** 1                              = 141241241241241248267654747412.0000000000
141241241241241248267654747412 ** -9                             = 0.0000000000
141241241241241248267654747412 ** 0                              = 1.0000000000
141241241241241248267654747412 ** -0                             = 1.0000000000

Number "-149143276547656984948124912" (scale 10)
-149143276547656984948124912 ** 15                             = -401841881822660241398409660309345646463535278187389488718526585893873800090729191609465595568674086078015487989884600849819723618141030735892646637579078630759905628572464757376301450900008605507116286859140901254928168279833198528761329808672095261265618307499605901098109261736293336298350347017449323858811047847238969925531775390894165290898723086447624518554747816961256145036283496890368.0000000000
-149143276547656984948124912 ** -15                            = 0.0000000000
-149143276547656984948124912 ** 1                              = -149143276547656984948124912.0000000000
-149143276547656984948124912 ** -9                             = 0.0000000000
-149143276547656984948124912 ** 0                              = 1.0000000000
-149143276547656984948124912 ** -0                             = 1.0000000000

Number "-132132245132134.1515123765412" (scale 10)
-132132245132134.1515123765412 ** 15                             = -65332942084431118671715132691017936828728297532817376297090067844431557352758338594306899592493441083845683845573112529065975725871957965764869599362286162979915656223771056616561461958797695558519631556073805440.8743426066
-132132245132134.1515123765412 ** -15                            = 0.0000000000
-132132245132134.1515123765412 ** 1                              = -132132245132134.1515123765
-132132245132134.1515123765412 ** -9                             = 0.0000000000
-132132245132134.1515123765412 ** 0                              = 1.0000000000
-132132245132134.1515123765412 ** -0                             = 1.0000000000

Number "0.1322135476547459213732911312" (scale 10)
0.1322135476547459213732911312 ** 15                             = 0.0000000000
0.1322135476547459213732911312 ** -15                            = 15165635699683.8093525277
0.1322135476547459213732911312 ** 1                              = 0.1322135476
0.1322135476547459213732911312 ** -9                             = 81005847.7955131768
0.1322135476547459213732911312 ** 0                              = 1.0000000000
0.1322135476547459213732911312 ** -0                             = 1.0000000000

Number "-0.123912932193769965476541321" (scale 10)
-0.123912932193769965476541321 ** 15                             = 0.0000000000
-0.123912932193769965476541321 ** -15                            = -40109799462729.8625078080
-0.123912932193769965476541321 ** 1                              = -0.1239129321
-0.123912932193769965476541321 ** -9                             = -145194543.0878622400
-0.123912932193769965476541321 ** 0                              = 1.0000000000
-0.123912932193769965476541321 ** -0                             = 1.0000000000