<?php
include_once ('vendor/autoload.php');

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\DiagnosticErrorListener;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\ParserRuleContext;
use Antlr\Antlr4\Runtime\Tree\ErrorNode;
use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
use Antlr\Antlr4\Runtime\Tree\ParseTreeWalker;
use Antlr\Antlr4\Runtime\Tree\TerminalNode;

final class TreeShapeListener implements ParseTreeListener
{
    public function visitTerminal(TerminalNode $node): void
    {
    }

    public function visitErrorNode(ErrorNode $node): void
    {
    }

    public function exitEveryRule(ParserRuleContext $ctx): void
    {
    }

    public function enterEveryRule(ParserRuleContext $ctx): void
    {
        echo $ctx->getText();
    }
}

$input = InputStream::fromPath('examples/library.oal');

$lexer = new OALLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new OALParser($tokens);
$parser->addErrorListener(new DiagnosticErrorListener());

$tree = $parser->program();

ParseTreeWalker::default()->walk(new TreeShapeListener(), $tree);