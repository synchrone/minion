<?php printf('%s [ %s ]: %s',$class, $code, $message); ?>

------------
<?php printf('%s [ %d ]',Debug::path($file), $line); ?>

STACK TRACE:
<?php foreach (Debug::trace($trace) as $i => $step)
{
    if ($step['file']){
        printf("\t%s [ %d ]",Debug::path($step['file']),$step['line']);
    }else{
        printf("\t{%s}",__('PHP internal call'));
    }
    printf(' » %s (%s)'.PHP_EOL, $step['function'],'...');
}
?>