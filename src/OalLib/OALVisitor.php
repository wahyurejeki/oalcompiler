<?php

/*
 * Generated from OAL.g4 by ANTLR 4.13.2
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see OALParser}.
 */
interface OALVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see OALParser::program()}.
	 *
	 * @param Context\ProgramContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitProgram(Context\ProgramContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::importStmt()}.
	 *
	 * @param Context\ImportStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitImportStmt(Context\ImportStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::requireStmt()}.
	 *
	 * @param Context\RequireStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRequireStmt(Context\RequireStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::idPath()}.
	 *
	 * @param Context\IdPathContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIdPath(Context\IdPathContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::statement()}.
	 *
	 * @param Context\StatementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStatement(Context\StatementContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::varStmt()}.
	 *
	 * @param Context\VarStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitVarStmt(Context\VarStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::assignmentStmt()}.
	 *
	 * @param Context\AssignmentStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssignmentStmt(Context\AssignmentStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::modelStmt()}.
	 *
	 * @param Context\ModelStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitModelStmt(Context\ModelStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::modelBody()}.
	 *
	 * @param Context\ModelBodyContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitModelBody(Context\ModelBodyContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::field()}.
	 *
	 * @param Context\FieldContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitField(Context\FieldContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::fieldModifier()}.
	 *
	 * @param Context\FieldModifierContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFieldModifier(Context\FieldModifierContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::relation()}.
	 *
	 * @param Context\RelationContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRelation(Context\RelationContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::controllerStmt()}.
	 *
	 * @param Context\ControllerStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitControllerStmt(Context\ControllerStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::controllerBody()}.
	 *
	 * @param Context\ControllerBodyContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitControllerBody(Context\ControllerBodyContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::controllerMethod()}.
	 *
	 * @param Context\ControllerMethodContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitControllerMethod(Context\ControllerMethodContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::parameterList()}.
	 *
	 * @param Context\ParameterListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParameterList(Context\ParameterListContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::parameter()}.
	 *
	 * @param Context\ParameterContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParameter(Context\ParameterContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::block()}.
	 *
	 * @param Context\BlockContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBlock(Context\BlockContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::middlewareStmt()}.
	 *
	 * @param Context\MiddlewareStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMiddlewareStmt(Context\MiddlewareStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::middlewareMethod()}.
	 *
	 * @param Context\MiddlewareMethodContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMiddlewareMethod(Context\MiddlewareMethodContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::expressionStmt()}.
	 *
	 * @param Context\ExpressionStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExpressionStmt(Context\ExpressionStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::expression()}.
	 *
	 * @param Context\ExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExpression(Context\ExpressionContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::logicalOrExpr()}.
	 *
	 * @param Context\LogicalOrExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLogicalOrExpr(Context\LogicalOrExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::logicalAndExpr()}.
	 *
	 * @param Context\LogicalAndExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLogicalAndExpr(Context\LogicalAndExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::equalityExpr()}.
	 *
	 * @param Context\EqualityExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitEqualityExpr(Context\EqualityExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::relationalExpr()}.
	 *
	 * @param Context\RelationalExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRelationalExpr(Context\RelationalExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::additiveExpr()}.
	 *
	 * @param Context\AdditiveExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAdditiveExpr(Context\AdditiveExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::multiplicativeExpr()}.
	 *
	 * @param Context\MultiplicativeExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMultiplicativeExpr(Context\MultiplicativeExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::unaryExpr()}.
	 *
	 * @param Context\UnaryExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnaryExpr(Context\UnaryExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::atom()}.
	 *
	 * @param Context\AtomContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAtom(Context\AtomContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::newExpr()}.
	 *
	 * @param Context\NewExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNewExpr(Context\NewExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::returnStmt()}.
	 *
	 * @param Context\ReturnStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturnStmt(Context\ReturnStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::idChain()}.
	 *
	 * @param Context\IdChainContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIdChain(Context\IdChainContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::functionCall()}.
	 *
	 * @param Context\FunctionCallContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFunctionCall(Context\FunctionCallContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::argumentList()}.
	 *
	 * @param Context\ArgumentListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArgumentList(Context\ArgumentListContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::arrayLiteral()}.
	 *
	 * @param Context\ArrayLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteral(Context\ArrayLiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::arrayElement()}.
	 *
	 * @param Context\ArrayElementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayElement(Context\ArrayElementContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::sessionFunction()}.
	 *
	 * @param Context\SessionFunctionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSessionFunction(Context\SessionFunctionContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::cookieFunction()}.
	 *
	 * @param Context\CookieFunctionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCookieFunction(Context\CookieFunctionContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::httpFetchFunction()}.
	 *
	 * @param Context\HttpFetchFunctionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitHttpFetchFunction(Context\HttpFetchFunctionContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::responseFunction()}.
	 *
	 * @param Context\ResponseFunctionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitResponseFunction(Context\ResponseFunctionContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::routeStmt()}.
	 *
	 * @param Context\RouteStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRouteStmt(Context\RouteStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::middlewareList()}.
	 *
	 * @param Context\MiddlewareListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMiddlewareList(Context\MiddlewareListContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::controllerRef()}.
	 *
	 * @param Context\ControllerRefContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitControllerRef(Context\ControllerRefContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::foreachStmt()}.
	 *
	 * @param Context\ForeachStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForeachStmt(Context\ForeachStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::forStmt()}.
	 *
	 * @param Context\ForStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForStmt(Context\ForStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::whileStmt()}.
	 *
	 * @param Context\WhileStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitWhileStmt(Context\WhileStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::breakStmt()}.
	 *
	 * @param Context\BreakStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBreakStmt(Context\BreakStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::continueStmt()}.
	 *
	 * @param Context\ContinueStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitContinueStmt(Context\ContinueStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::tryCatchStmt()}.
	 *
	 * @param Context\TryCatchStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTryCatchStmt(Context\TryCatchStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::throwStmt()}.
	 *
	 * @param Context\ThrowStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitThrowStmt(Context\ThrowStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::validateStmt()}.
	 *
	 * @param Context\ValidateStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitValidateStmt(Context\ValidateStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::ifStmt()}.
	 *
	 * @param Context\IfStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIfStmt(Context\IfStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::comparisonOperator()}.
	 *
	 * @param Context\ComparisonOperatorContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitComparisonOperator(Context\ComparisonOperatorContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::logicalOperator()}.
	 *
	 * @param Context\LogicalOperatorContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLogicalOperator(Context\LogicalOperatorContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::oalType()}.
	 *
	 * @param Context\OalTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitOalType(Context\OalTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::modelMethodCall()}.
	 *
	 * @param Context\ModelMethodCallContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitModelMethodCall(Context\ModelMethodCallContext $context);

	/**
	 * Visit a parse tree produced by {@see OALParser::modelMethodParams()}.
	 *
	 * @param Context\ModelMethodParamsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitModelMethodParams(Context\ModelMethodParamsContext $context);
}