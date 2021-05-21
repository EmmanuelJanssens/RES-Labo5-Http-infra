
<?php
    $STATIC_APP = getenv('STATIC_APP');
    $DYNAMIC_APP = getenv('DYNAMIC_APP');

?>
<VirtualHost *:80>
    ServerName demo.res.ch

    ProxyPass '/api/countries/' 'http://<?php print "$DYNAMIC_APP"?>'
    ProxyPassReverse '/api/countries/' 'http://<?php print "$DYNAMIC_APP"?>'


    <Proxy balancer://mycluster>
        BalancerMember http://<?php print "$STATIC_APP"?> 

    </Proxy>

    ProxyPreserveHost On

    ProxyPass '/' 'balancer://mycluster/'
    ProxyPassReverse '/' 'balancer://mycluster/'
</VirtualHost>
