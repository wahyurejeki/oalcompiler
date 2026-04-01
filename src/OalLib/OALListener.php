<?php

/*
 * Generated from OAL.g4 by ANTLR 4.13.2
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see OALParser}.
 */
interface OALListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see OALParser::program()}.
	 * @param $context The parse tree.
	 */
	public function enterProgram(Context\ProgramContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::program()}.
	 * @param $context The parse tree.
	 */
	public function exitProgram(Context\ProgramContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::importStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterImportStmt(Context\ImportStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::importStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitImportStmt(Context\ImportStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::requireStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterRequireStmt(Context\RequireStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::requireStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitRequireStmt(Context\RequireStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::idPath()}.
	 * @param $context The parse tree.
	 */
	public function enterIdPath(Context\IdPathContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::idPath()}.
	 * @param $context The parse tree.
	 */
	public function exitIdPath(Context\IdPathContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterStatement(Context\StatementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitStatement(Context\StatementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::varStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterVarStmt(Context\VarStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::varStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitVarStmt(Context\VarStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::assignmentStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterAssignmentStmt(Context\AssignmentStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::assignmentStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitAssignmentStmt(Context\AssignmentStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::modelStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterModelStmt(Context\ModelStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::modelStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitModelStmt(Context\ModelStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::modelBody()}.
	 * @param $context The parse tree.
	 */
	public function enterModelBody(Context\ModelBodyContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::modelBody()}.
	 * @param $context The parse tree.
	 */
	public function exitModelBody(Context\ModelBodyContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::field()}.
	 * @param $context The parse tree.
	 */
	public function enterField(Context\FieldContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::field()}.
	 * @param $context The parse tree.
	 */
	public function exitField(Context\FieldContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::fieldModifier()}.
	 * @param $context The parse tree.
	 */
	public function enterFieldModifier(Context\FieldModifierContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::fieldModifier()}.
	 * @param $context The parse tree.
	 */
	public function exitFieldModifier(Context\FieldModifierContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::relation()}.
	 * @param $context The parse tree.
	 */
	public function enterRelation(Context\RelationContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::relation()}.
	 * @param $context The parse tree.
	 */
	public function exitRelation(Context\RelationContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::controllerStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterControllerStmt(Context\ControllerStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::controllerStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitControllerStmt(Context\ControllerStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::controllerBody()}.
	 * @param $context The parse tree.
	 */
	public function enterControllerBody(Context\ControllerBodyContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::controllerBody()}.
	 * @param $context The parse tree.
	 */
	public function exitControllerBody(Context\ControllerBodyContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::controllerMethod()}.
	 * @param $context The parse tree.
	 */
	public function enterControllerMethod(Context\ControllerMethodContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::controllerMethod()}.
	 * @param $context The parse tree.
	 */
	public function exitControllerMethod(Context\ControllerMethodContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::parameterList()}.
	 * @param $context The parse tree.
	 */
	public function enterParameterList(Context\ParameterListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::parameterList()}.
	 * @param $context The parse tree.
	 */
	public function exitParameterList(Context\ParameterListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::parameter()}.
	 * @param $context The parse tree.
	 */
	public function enterParameter(Context\ParameterContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::parameter()}.
	 * @param $context The parse tree.
	 */
	public function exitParameter(Context\ParameterContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::block()}.
	 * @param $context The parse tree.
	 */
	public function enterBlock(Context\BlockContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::block()}.
	 * @param $context The parse tree.
	 */
	public function exitBlock(Context\BlockContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::middlewareStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterMiddlewareStmt(Context\MiddlewareStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::middlewareStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitMiddlewareStmt(Context\MiddlewareStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::middlewareMethod()}.
	 * @param $context The parse tree.
	 */
	public function enterMiddlewareMethod(Context\MiddlewareMethodContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::middlewareMethod()}.
	 * @param $context The parse tree.
	 */
	public function exitMiddlewareMethod(Context\MiddlewareMethodContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::expressionStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterExpressionStmt(Context\ExpressionStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::expressionStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitExpressionStmt(Context\ExpressionStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterExpression(Context\ExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitExpression(Context\ExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::logicalOrExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicalOrExpr(Context\LogicalOrExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::logicalOrExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicalOrExpr(Context\LogicalOrExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::logicalAndExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicalAndExpr(Context\LogicalAndExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::logicalAndExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicalAndExpr(Context\LogicalAndExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::equalityExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterEqualityExpr(Context\EqualityExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::equalityExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitEqualityExpr(Context\EqualityExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::relationalExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterRelationalExpr(Context\RelationalExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::relationalExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitRelationalExpr(Context\RelationalExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::additiveExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterAdditiveExpr(Context\AdditiveExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::additiveExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitAdditiveExpr(Context\AdditiveExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::multiplicativeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterMultiplicativeExpr(Context\MultiplicativeExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::multiplicativeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitMultiplicativeExpr(Context\MultiplicativeExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::unaryExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterUnaryExpr(Context\UnaryExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::unaryExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitUnaryExpr(Context\UnaryExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::atom()}.
	 * @param $context The parse tree.
	 */
	public function enterAtom(Context\AtomContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::atom()}.
	 * @param $context The parse tree.
	 */
	public function exitAtom(Context\AtomContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::newExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterNewExpr(Context\NewExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::newExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitNewExpr(Context\NewExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::idChain()}.
	 * @param $context The parse tree.
	 */
	public function enterIdChain(Context\IdChainContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::idChain()}.
	 * @param $context The parse tree.
	 */
	public function exitIdChain(Context\IdChainContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::functionCall()}.
	 * @param $context The parse tree.
	 */
	public function enterFunctionCall(Context\FunctionCallContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::functionCall()}.
	 * @param $context The parse tree.
	 */
	public function exitFunctionCall(Context\FunctionCallContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::argumentList()}.
	 * @param $context The parse tree.
	 */
	public function enterArgumentList(Context\ArgumentListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::argumentList()}.
	 * @param $context The parse tree.
	 */
	public function exitArgumentList(Context\ArgumentListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::arrayElement()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayElement(Context\ArrayElementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::arrayElement()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayElement(Context\ArrayElementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::sessionFunction()}.
	 * @param $context The parse tree.
	 */
	public function enterSessionFunction(Context\SessionFunctionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::sessionFunction()}.
	 * @param $context The parse tree.
	 */
	public function exitSessionFunction(Context\SessionFunctionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::cookieFunction()}.
	 * @param $context The parse tree.
	 */
	public function enterCookieFunction(Context\CookieFunctionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::cookieFunction()}.
	 * @param $context The parse tree.
	 */
	public function exitCookieFunction(Context\CookieFunctionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::httpFetchFunction()}.
	 * @param $context The parse tree.
	 */
	public function enterHttpFetchFunction(Context\HttpFetchFunctionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::httpFetchFunction()}.
	 * @param $context The parse tree.
	 */
	public function exitHttpFetchFunction(Context\HttpFetchFunctionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::responseFunction()}.
	 * @param $context The parse tree.
	 */
	public function enterResponseFunction(Context\ResponseFunctionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::responseFunction()}.
	 * @param $context The parse tree.
	 */
	public function exitResponseFunction(Context\ResponseFunctionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::routeStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterRouteStmt(Context\RouteStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::routeStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitRouteStmt(Context\RouteStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::middlewareList()}.
	 * @param $context The parse tree.
	 */
	public function enterMiddlewareList(Context\MiddlewareListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::middlewareList()}.
	 * @param $context The parse tree.
	 */
	public function exitMiddlewareList(Context\MiddlewareListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::controllerRef()}.
	 * @param $context The parse tree.
	 */
	public function enterControllerRef(Context\ControllerRefContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::controllerRef()}.
	 * @param $context The parse tree.
	 */
	public function exitControllerRef(Context\ControllerRefContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::foreachStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForeachStmt(Context\ForeachStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::foreachStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForeachStmt(Context\ForeachStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForStmt(Context\ForStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForStmt(Context\ForStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::whileStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterWhileStmt(Context\WhileStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::whileStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitWhileStmt(Context\WhileStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::tryCatchStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterTryCatchStmt(Context\TryCatchStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::tryCatchStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitTryCatchStmt(Context\TryCatchStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::throwStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterThrowStmt(Context\ThrowStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::throwStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitThrowStmt(Context\ThrowStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::validateStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterValidateStmt(Context\ValidateStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::validateStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitValidateStmt(Context\ValidateStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::comparisonOperator()}.
	 * @param $context The parse tree.
	 */
	public function enterComparisonOperator(Context\ComparisonOperatorContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::comparisonOperator()}.
	 * @param $context The parse tree.
	 */
	public function exitComparisonOperator(Context\ComparisonOperatorContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::logicalOperator()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicalOperator(Context\LogicalOperatorContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::logicalOperator()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicalOperator(Context\LogicalOperatorContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::oalType()}.
	 * @param $context The parse tree.
	 */
	public function enterOalType(Context\OalTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::oalType()}.
	 * @param $context The parse tree.
	 */
	public function exitOalType(Context\OalTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::modelMethodCall()}.
	 * @param $context The parse tree.
	 */
	public function enterModelMethodCall(Context\ModelMethodCallContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::modelMethodCall()}.
	 * @param $context The parse tree.
	 */
	public function exitModelMethodCall(Context\ModelMethodCallContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OALParser::modelMethodParams()}.
	 * @param $context The parse tree.
	 */
	public function enterModelMethodParams(Context\ModelMethodParamsContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OALParser::modelMethodParams()}.
	 * @param $context The parse tree.
	 */
	public function exitModelMethodParams(Context\ModelMethodParamsContext $context): void;
}