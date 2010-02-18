<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Title: Config
  The most important settings for the game are set here.
*/

/*
  Variables: Database Connection
  Connection settings for the database.
  
  $config_server - Database server
  $config_dbname - Database name
  $config_username - Username to login to server with
  $config_password - Password to login to server with
  $config_driver - Contains the database driver to use to connect to the database.
*/
$config_server = 'localhost';
$config_dbname = 'ezrpg';
$config_username = 'root';
$config_password = '';
$config_driver = 'mysql';

/*
  Constant:
  This secret key is used in the hashing of player passwords and other important data.
  Secret keys can be of any length, however longer keys are more effective.
  
  This should only ever be set ONCE! Any changes to it will cause your game to break!
  You should save a copy of the key on your computer, just in case the secret key is lost or accidentally changed,.
  
  SECRET_KEY - A long string of random characters.
*/
define('SECRET_KEY', 'r>VOv(R,+j?|1fBmi6V|1o=C5sFGnE<K5Ag_n{<Ci-x|TE7CXjVqT/^,XbN|9!km$j}49M7SaIp`eMB0z6p|92B8P>)|]UZ8P%FyT(cmXbF|]/Z8zbghTERuz6)GD(BCP-gG.w7uHQpy./kuz-?#1{<[i-N4LUc&ibNWeU<m+Ixhe(BuXj)_D{cCrjF`nf7CabNWLw=mX%?GL!k8i-3#9/Ju:s}qn!B8XQ@`LMc,:YFheft,5b@#Dw^0:j@_*otSH%3|ef=[:-?4Dw<CP6NW12cKXjp|e!^&rj)y.oB0rYxyv{<SX%N_nMBd+YxO1fZS:>?OTfc&ijp#*/<&z6gWD!=&H-3O*{c85Yg#DfJK5%F41U=[5bF#n(7CXY3|vo^C56p_*{cSPsp`9U^KzQ}GvER,HIxqD{R&z-VG](Bd:jx_*/<KX%gO./ZKPbpWeMkCr-p`vUtKaQ?hn{J[PQVGDM<Crj@#ef^8$6)Ov!^[HAF_*2=&563G.E<8r6}G9U7SXY@#TEZmaY?`eMZSP6Fqv!ZS+bFO1ft&H>}hLM7S56x`.fZC:%FO*{=miQg`nMcSi%@|.EJ8X-pOTot,5A?q.oJ[5%)`DwR8+IpWnE^C$-F`D!Rda6xG*wtK+j)O*Ut8+Q}y1o^K:>pGL!c05Q)`]Mcd5Ag#]w<&Pbx_DMcCa-xqTot0:%?h1M^S$>Fh1(Z8Hbx_e(ZCis?O]Mcd+QN4.{RKPb}y1Mt8:QVye/kmPbFWT(k,a6V`1(R&PY@|v{kSiINqD2<dP6?#*/=8+Ax_]ok0i>p`TM7&X%?Wvfc&$Ix#92tS:%x#*/cuHIxWe(RS5>)#*2k,5Yp_vE=m5A}O.2Z,:63W]2<8asx`12k0rYF#e{^[a6p4LE^Sib3G9{78aA?heMk8abphnw7Kaj@4]{tm:sxy*2J&5-Fyn!JuP>x|v!=KzI}#1{B0a-p`noc8X-FyTMB0rA?q12Bu+jFy1EcSH>@_T(7diA3#T2RdXjF|vE^mHAN4vwc[$QVOn{ZS');


/*
  Constants: Settings
  Various settings used in ezRPG.
  
  DB_PREFIX - Prefix to the table names
  VERSION - Version of ezRPG
  SHOW_ERRORS - Turn on to show PHP errors.
  DEBUG_MODE - Turn on to show database errors and debug information.
*/
define('DB_PREFIX', '');
define('VERSION', '1.0');
define('SHOW_ERRORS', 1);
define('DEBUG_MODE', 1);
?>