<?php

/*
 * Generated from OAL.g4 by ANTLR 4.13.2
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class OALParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, T__13 = 14, T__14 = 15, T__15 = 16, T__16 = 17, 
               T__17 = 18, T__18 = 19, T__19 = 20, T__20 = 21, T__21 = 22, 
               T__22 = 23, T__23 = 24, T__24 = 25, T__25 = 26, T__26 = 27, 
               T__27 = 28, T__28 = 29, T__29 = 30, T__30 = 31, T__31 = 32, 
               T__32 = 33, T__33 = 34, T__34 = 35, T__35 = 36, T__36 = 37, 
               T__37 = 38, T__38 = 39, T__39 = 40, T__40 = 41, T__41 = 42, 
               T__42 = 43, T__43 = 44, T__44 = 45, T__45 = 46, T__46 = 47, 
               T__47 = 48, T__48 = 49, STRING_TYPE = 50, TEXT_TYPE = 51, 
               INTEGER_TYPE = 52, BIGINTEGER_TYPE = 53, FLOAT_TYPE = 54, 
               DOUBLE_TYPE = 55, DECIMAL_TYPE = 56, BOOLEAN_TYPE = 57, DATE_TYPE = 58, 
               DATETIME_TYPE = 59, TIME_TYPE = 60, TIMESTAMP_TYPE = 61, 
               ROUTE = 62, MODEL = 63, CONTROLLER = 64, MIDDLEWARE = 65, 
               FUNCTION = 66, RETURN = 67, IF = 68, ELSEIF = 69, ELSE = 70, 
               FOR = 71, WHILE = 72, BREAK = 73, CONTINUE = 74, TRY = 75, 
               CATCH = 76, THROW = 77, VALIDATE = 78, REQUIRE = 79, NEW = 80, 
               IN = 81, COMMA = 82, SEMICOLON = 83, COLON = 84, DOT = 85, 
               EQUAL = 86, ARROW = 87, ARROW_ASSOC = 88, OR = 89, AND = 90, 
               CONTROLLER_METHOD = 91, CONTROLLER_METHOD_NAME = 92, MODEL_METHOD = 93, 
               HTTP_METHOD = 94, ID = 95, NUMBER = 96, STRING = 97, LINE_COMMENT = 98, 
               BLOCK_COMMENT = 99, WS = 100;

		public const RULE_program = 0, RULE_importStmt = 1, RULE_requireStmt = 2, 
               RULE_idPath = 3, RULE_statement = 4, RULE_varStmt = 5, RULE_assignmentStmt = 6, 
               RULE_modelStmt = 7, RULE_modelBody = 8, RULE_field = 9, RULE_fieldModifier = 10, 
               RULE_relation = 11, RULE_controllerStmt = 12, RULE_controllerBody = 13, 
               RULE_controllerMethod = 14, RULE_parameterList = 15, RULE_parameter = 16, 
               RULE_block = 17, RULE_middlewareStmt = 18, RULE_middlewareMethod = 19, 
               RULE_expressionStmt = 20, RULE_expression = 21, RULE_logicalOrExpr = 22, 
               RULE_logicalAndExpr = 23, RULE_equalityExpr = 24, RULE_relationalExpr = 25, 
               RULE_additiveExpr = 26, RULE_multiplicativeExpr = 27, RULE_unaryExpr = 28, 
               RULE_atom = 29, RULE_newExpr = 30, RULE_returnStmt = 31, 
               RULE_idChain = 32, RULE_functionCall = 33, RULE_argumentList = 34, 
               RULE_arrayLiteral = 35, RULE_arrayElement = 36, RULE_sessionFunction = 37, 
               RULE_cookieFunction = 38, RULE_httpFetchFunction = 39, RULE_responseFunction = 40, 
               RULE_routeStmt = 41, RULE_middlewareList = 42, RULE_controllerRef = 43, 
               RULE_foreachStmt = 44, RULE_forStmt = 45, RULE_whileStmt = 46, 
               RULE_breakStmt = 47, RULE_continueStmt = 48, RULE_tryCatchStmt = 49, 
               RULE_throwStmt = 50, RULE_validateStmt = 51, RULE_ifStmt = 52, 
               RULE_comparisonOperator = 53, RULE_logicalOperator = 54, 
               RULE_oalType = 55, RULE_modelMethodCall = 56, RULE_modelMethodParams = 57;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'importStmt', 'requireStmt', 'idPath', 'statement', 'varStmt', 
			'assignmentStmt', 'modelStmt', 'modelBody', 'field', 'fieldModifier', 
			'relation', 'controllerStmt', 'controllerBody', 'controllerMethod', 'parameterList', 
			'parameter', 'block', 'middlewareStmt', 'middlewareMethod', 'expressionStmt', 
			'expression', 'logicalOrExpr', 'logicalAndExpr', 'equalityExpr', 'relationalExpr', 
			'additiveExpr', 'multiplicativeExpr', 'unaryExpr', 'atom', 'newExpr', 
			'returnStmt', 'idChain', 'functionCall', 'argumentList', 'arrayLiteral', 
			'arrayElement', 'sessionFunction', 'cookieFunction', 'httpFetchFunction', 
			'responseFunction', 'routeStmt', 'middlewareList', 'controllerRef', 'foreachStmt', 
			'forStmt', 'whileStmt', 'breakStmt', 'continueStmt', 'tryCatchStmt', 
			'throwStmt', 'validateStmt', 'ifStmt', 'comparisonOperator', 'logicalOperator', 
			'oalType', 'modelMethodCall', 'modelMethodParams'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'import'", "'from'", "'var'", "'{'", "'}'", "'primary'", "'unique'", 
		    "'nullable'", "'index'", "'default'", "'('", "')'", "'hasOne'", "'hasMany'", 
		    "'belongsTo'", "'belongsToMany'", "'handleAction'", "'=='", "'!='", 
		    "'<'", "'<='", "'>'", "'>='", "'+'", "'-'", "'*'", "'/'", "'%'", "'!'", 
		    "'true'", "'false'", "'null'", "'['", "']'", "'setSession'", "'getSession'", 
		    "'removeSession'", "'setCookie'", "'getCookie'", "'removeCookie'", 
		    "'fetchGet'", "'fetchPost'", "'json'", "'html'", "'redirect'", "'print'", 
		    "'render'", "'split'", "'foreach'", "'string'", "'text'", "'integer'", 
		    "'bigInteger'", "'float'", "'double'", "'decimal'", "'boolean'", "'date'", 
		    "'datetime'", "'time'", "'timestamp'", "'route'", "'model'", "'controller'", 
		    "'middleware'", "'function'", "'return'", "'if'", "'elseif'", "'else'", 
		    "'for'", "'while'", "'break'", "'continue'", "'try'", "'catch'", "'throw'", 
		    "'validate'", "'require'", "'new'", "'in'", "','", "';'", "':'", "'.'", 
		    "'='", "'->'", "'=>'", "'||'", "'&&'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, "STRING_TYPE", "TEXT_TYPE", "INTEGER_TYPE", 
		    "BIGINTEGER_TYPE", "FLOAT_TYPE", "DOUBLE_TYPE", "DECIMAL_TYPE", "BOOLEAN_TYPE", 
		    "DATE_TYPE", "DATETIME_TYPE", "TIME_TYPE", "TIMESTAMP_TYPE", "ROUTE", 
		    "MODEL", "CONTROLLER", "MIDDLEWARE", "FUNCTION", "RETURN", "IF", "ELSEIF", 
		    "ELSE", "FOR", "WHILE", "BREAK", "CONTINUE", "TRY", "CATCH", "THROW", 
		    "VALIDATE", "REQUIRE", "NEW", "IN", "COMMA", "SEMICOLON", "COLON", 
		    "DOT", "EQUAL", "ARROW", "ARROW_ASSOC", "OR", "AND", "CONTROLLER_METHOD", 
		    "CONTROLLER_METHOD_NAME", "MODEL_METHOD", "HTTP_METHOD", "ID", "NUMBER", 
		    "STRING", "LINE_COMMENT", "BLOCK_COMMENT", "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 100, 662, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 2, 44, 7, 44, 2, 45, 7, 45, 2, 46, 7, 46, 2, 47, 7, 47, 
		    2, 48, 7, 48, 2, 49, 7, 49, 2, 50, 7, 50, 2, 51, 7, 51, 2, 52, 7, 
		    52, 2, 53, 7, 53, 2, 54, 7, 54, 2, 55, 7, 55, 2, 56, 7, 56, 2, 57, 
		    7, 57, 1, 0, 1, 0, 1, 0, 5, 0, 120, 8, 0, 10, 0, 12, 0, 123, 9, 0, 
		    1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 2, 1, 2, 
		    1, 2, 1, 3, 1, 3, 1, 3, 5, 3, 140, 8, 3, 10, 3, 12, 3, 143, 9, 3, 
		    1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 
		    1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 3, 4, 162, 8, 4, 1, 5, 1, 5, 1, 
		    5, 1, 5, 1, 5, 1, 5, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 
		    7, 1, 7, 5, 7, 179, 8, 7, 10, 7, 12, 7, 182, 9, 7, 1, 7, 1, 7, 1, 
		    8, 1, 8, 3, 8, 188, 8, 8, 1, 9, 1, 9, 1, 9, 5, 9, 193, 8, 9, 10, 9, 
		    12, 9, 196, 9, 9, 1, 9, 1, 9, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 
		    10, 1, 10, 1, 10, 1, 10, 3, 10, 209, 8, 10, 1, 11, 1, 11, 1, 11, 1, 
		    11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 3, 11, 
		    223, 8, 11, 1, 12, 1, 12, 1, 12, 1, 12, 4, 12, 229, 8, 12, 11, 12, 
		    12, 12, 230, 1, 12, 1, 12, 1, 13, 1, 13, 1, 14, 1, 14, 1, 14, 1, 14, 
		    3, 14, 241, 8, 14, 1, 14, 1, 14, 1, 14, 1, 15, 1, 15, 1, 15, 5, 15, 
		    249, 8, 15, 10, 15, 12, 15, 252, 9, 15, 1, 16, 1, 16, 3, 16, 256, 
		    8, 16, 1, 16, 1, 16, 1, 17, 1, 17, 5, 17, 262, 8, 17, 10, 17, 12, 
		    17, 265, 9, 17, 1, 17, 1, 17, 1, 18, 1, 18, 1, 18, 1, 18, 4, 18, 273, 
		    8, 18, 11, 18, 12, 18, 274, 1, 18, 1, 18, 1, 19, 1, 19, 1, 19, 1, 
		    19, 3, 19, 283, 8, 19, 1, 19, 1, 19, 1, 19, 1, 20, 1, 20, 1, 20, 1, 
		    21, 1, 21, 1, 22, 1, 22, 1, 22, 5, 22, 296, 8, 22, 10, 22, 12, 22, 
		    299, 9, 22, 1, 23, 1, 23, 1, 23, 5, 23, 304, 8, 23, 10, 23, 12, 23, 
		    307, 9, 23, 1, 24, 1, 24, 1, 24, 5, 24, 312, 8, 24, 10, 24, 12, 24, 
		    315, 9, 24, 1, 25, 1, 25, 1, 25, 5, 25, 320, 8, 25, 10, 25, 12, 25, 
		    323, 9, 25, 1, 26, 1, 26, 1, 26, 5, 26, 328, 8, 26, 10, 26, 12, 26, 
		    331, 9, 26, 1, 27, 1, 27, 1, 27, 5, 27, 336, 8, 27, 10, 27, 12, 27, 
		    339, 9, 27, 1, 28, 1, 28, 1, 28, 3, 28, 344, 8, 28, 1, 29, 1, 29, 
		    1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 
		    29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 3, 29, 364, 8, 29, 1, 
		    30, 1, 30, 1, 30, 1, 30, 3, 30, 370, 8, 30, 1, 30, 1, 30, 1, 31, 1, 
		    31, 3, 31, 376, 8, 31, 1, 31, 1, 31, 1, 32, 1, 32, 1, 32, 1, 32, 1, 
		    32, 1, 32, 1, 32, 3, 32, 387, 8, 32, 1, 32, 1, 32, 3, 32, 391, 8, 
		    32, 1, 32, 3, 32, 394, 8, 32, 5, 32, 396, 8, 32, 10, 32, 12, 32, 399, 
		    9, 32, 1, 33, 1, 33, 1, 33, 3, 33, 404, 8, 33, 1, 33, 1, 33, 1, 34, 
		    1, 34, 1, 34, 5, 34, 411, 8, 34, 10, 34, 12, 34, 414, 9, 34, 1, 35, 
		    1, 35, 1, 35, 1, 35, 5, 35, 420, 8, 35, 10, 35, 12, 35, 423, 9, 35, 
		    1, 35, 3, 35, 426, 8, 35, 1, 35, 1, 35, 1, 36, 1, 36, 1, 36, 3, 36, 
		    433, 8, 36, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 3, 37, 
		    442, 8, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 1, 37, 
		    1, 37, 1, 37, 1, 37, 1, 37, 3, 37, 456, 8, 37, 1, 38, 1, 38, 1, 38, 
		    1, 38, 1, 38, 1, 38, 1, 38, 3, 38, 465, 8, 38, 1, 38, 1, 38, 1, 38, 
		    1, 38, 1, 38, 1, 38, 1, 38, 1, 38, 1, 38, 1, 38, 1, 38, 1, 38, 3, 
		    38, 479, 8, 38, 1, 39, 1, 39, 1, 39, 1, 39, 1, 39, 1, 39, 1, 39, 3, 
		    39, 488, 8, 39, 1, 39, 1, 39, 1, 39, 1, 39, 1, 39, 1, 39, 1, 39, 1, 
		    39, 1, 39, 3, 39, 499, 8, 39, 1, 39, 1, 39, 3, 39, 503, 8, 39, 1, 
		    40, 1, 40, 1, 40, 3, 40, 508, 8, 40, 1, 40, 1, 40, 1, 40, 1, 40, 3, 
		    40, 514, 8, 40, 1, 40, 1, 40, 1, 40, 1, 40, 3, 40, 520, 8, 40, 1, 
		    40, 1, 40, 1, 40, 1, 40, 3, 40, 526, 8, 40, 1, 40, 1, 40, 1, 40, 1, 
		    40, 1, 40, 1, 40, 3, 40, 534, 8, 40, 1, 40, 1, 40, 1, 40, 1, 40, 1, 
		    40, 1, 40, 1, 40, 1, 40, 1, 40, 3, 40, 545, 8, 40, 1, 41, 1, 41, 1, 
		    41, 1, 41, 1, 41, 1, 41, 3, 41, 553, 8, 41, 1, 41, 1, 41, 1, 42, 1, 
		    42, 1, 42, 1, 42, 5, 42, 561, 8, 42, 10, 42, 12, 42, 564, 9, 42, 1, 
		    43, 1, 43, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 
		    1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 
		    46, 1, 46, 1, 46, 1, 46, 1, 46, 1, 46, 1, 47, 1, 47, 1, 47, 1, 48, 
		    1, 48, 1, 48, 1, 49, 1, 49, 1, 49, 1, 49, 1, 49, 1, 49, 1, 49, 1, 
		    49, 1, 49, 1, 50, 1, 50, 1, 50, 1, 50, 3, 50, 610, 8, 50, 1, 50, 1, 
		    50, 1, 50, 1, 51, 1, 51, 1, 51, 1, 51, 1, 52, 1, 52, 1, 52, 1, 52, 
		    1, 52, 1, 52, 1, 52, 1, 52, 1, 52, 1, 52, 1, 52, 5, 52, 630, 8, 52, 
		    10, 52, 12, 52, 633, 9, 52, 1, 52, 1, 52, 3, 52, 637, 8, 52, 1, 53, 
		    1, 53, 1, 54, 1, 54, 1, 55, 1, 55, 1, 56, 1, 56, 1, 56, 1, 56, 1, 
		    56, 3, 56, 650, 8, 56, 1, 56, 1, 56, 1, 57, 1, 57, 1, 57, 5, 57, 657, 
		    8, 57, 10, 57, 12, 57, 660, 9, 57, 1, 57, 0, 0, 58, 0, 2, 4, 6, 8, 
		    10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 
		    44, 46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 
		    78, 80, 82, 84, 86, 88, 90, 92, 94, 96, 98, 100, 102, 104, 106, 108, 
		    110, 112, 114, 0, 7, 1, 0, 18, 19, 1, 0, 20, 23, 1, 0, 24, 25, 1, 
		    0, 26, 28, 1, 0, 18, 23, 1, 0, 89, 90, 1, 0, 50, 61, 698, 0, 121, 
		    1, 0, 0, 0, 2, 126, 1, 0, 0, 0, 4, 132, 1, 0, 0, 0, 6, 136, 1, 0, 
		    0, 0, 8, 161, 1, 0, 0, 0, 10, 163, 1, 0, 0, 0, 12, 169, 1, 0, 0, 0, 
		    14, 174, 1, 0, 0, 0, 16, 187, 1, 0, 0, 0, 18, 189, 1, 0, 0, 0, 20, 
		    208, 1, 0, 0, 0, 22, 222, 1, 0, 0, 0, 24, 224, 1, 0, 0, 0, 26, 234, 
		    1, 0, 0, 0, 28, 236, 1, 0, 0, 0, 30, 245, 1, 0, 0, 0, 32, 255, 1, 
		    0, 0, 0, 34, 259, 1, 0, 0, 0, 36, 268, 1, 0, 0, 0, 38, 278, 1, 0, 
		    0, 0, 40, 287, 1, 0, 0, 0, 42, 290, 1, 0, 0, 0, 44, 292, 1, 0, 0, 
		    0, 46, 300, 1, 0, 0, 0, 48, 308, 1, 0, 0, 0, 50, 316, 1, 0, 0, 0, 
		    52, 324, 1, 0, 0, 0, 54, 332, 1, 0, 0, 0, 56, 343, 1, 0, 0, 0, 58, 
		    363, 1, 0, 0, 0, 60, 365, 1, 0, 0, 0, 62, 373, 1, 0, 0, 0, 64, 379, 
		    1, 0, 0, 0, 66, 400, 1, 0, 0, 0, 68, 407, 1, 0, 0, 0, 70, 415, 1, 
		    0, 0, 0, 72, 429, 1, 0, 0, 0, 74, 455, 1, 0, 0, 0, 76, 478, 1, 0, 
		    0, 0, 78, 502, 1, 0, 0, 0, 80, 544, 1, 0, 0, 0, 82, 546, 1, 0, 0, 
		    0, 84, 556, 1, 0, 0, 0, 86, 565, 1, 0, 0, 0, 88, 567, 1, 0, 0, 0, 
		    90, 575, 1, 0, 0, 0, 92, 584, 1, 0, 0, 0, 94, 590, 1, 0, 0, 0, 96, 
		    593, 1, 0, 0, 0, 98, 596, 1, 0, 0, 0, 100, 605, 1, 0, 0, 0, 102, 614, 
		    1, 0, 0, 0, 104, 618, 1, 0, 0, 0, 106, 638, 1, 0, 0, 0, 108, 640, 
		    1, 0, 0, 0, 110, 642, 1, 0, 0, 0, 112, 644, 1, 0, 0, 0, 114, 653, 
		    1, 0, 0, 0, 116, 120, 3, 2, 1, 0, 117, 120, 3, 4, 2, 0, 118, 120, 
		    3, 8, 4, 0, 119, 116, 1, 0, 0, 0, 119, 117, 1, 0, 0, 0, 119, 118, 
		    1, 0, 0, 0, 120, 123, 1, 0, 0, 0, 121, 119, 1, 0, 0, 0, 121, 122, 
		    1, 0, 0, 0, 122, 124, 1, 0, 0, 0, 123, 121, 1, 0, 0, 0, 124, 125, 
		    5, 0, 0, 1, 125, 1, 1, 0, 0, 0, 126, 127, 5, 1, 0, 0, 127, 128, 5, 
		    95, 0, 0, 128, 129, 5, 2, 0, 0, 129, 130, 3, 6, 3, 0, 130, 131, 5, 
		    83, 0, 0, 131, 3, 1, 0, 0, 0, 132, 133, 5, 79, 0, 0, 133, 134, 5, 
		    97, 0, 0, 134, 135, 5, 83, 0, 0, 135, 5, 1, 0, 0, 0, 136, 141, 5, 
		    95, 0, 0, 137, 138, 5, 85, 0, 0, 138, 140, 5, 95, 0, 0, 139, 137, 
		    1, 0, 0, 0, 140, 143, 1, 0, 0, 0, 141, 139, 1, 0, 0, 0, 141, 142, 
		    1, 0, 0, 0, 142, 7, 1, 0, 0, 0, 143, 141, 1, 0, 0, 0, 144, 162, 3, 
		    10, 5, 0, 145, 162, 3, 12, 6, 0, 146, 162, 3, 14, 7, 0, 147, 162, 
		    3, 24, 12, 0, 148, 162, 3, 82, 41, 0, 149, 162, 3, 36, 18, 0, 150, 
		    162, 3, 104, 52, 0, 151, 162, 3, 88, 44, 0, 152, 162, 3, 90, 45, 0, 
		    153, 162, 3, 92, 46, 0, 154, 162, 3, 94, 47, 0, 155, 162, 3, 96, 48, 
		    0, 156, 162, 3, 98, 49, 0, 157, 162, 3, 100, 50, 0, 158, 162, 3, 102, 
		    51, 0, 159, 162, 3, 40, 20, 0, 160, 162, 3, 62, 31, 0, 161, 144, 1, 
		    0, 0, 0, 161, 145, 1, 0, 0, 0, 161, 146, 1, 0, 0, 0, 161, 147, 1, 
		    0, 0, 0, 161, 148, 1, 0, 0, 0, 161, 149, 1, 0, 0, 0, 161, 150, 1, 
		    0, 0, 0, 161, 151, 1, 0, 0, 0, 161, 152, 1, 0, 0, 0, 161, 153, 1, 
		    0, 0, 0, 161, 154, 1, 0, 0, 0, 161, 155, 1, 0, 0, 0, 161, 156, 1, 
		    0, 0, 0, 161, 157, 1, 0, 0, 0, 161, 158, 1, 0, 0, 0, 161, 159, 1, 
		    0, 0, 0, 161, 160, 1, 0, 0, 0, 162, 9, 1, 0, 0, 0, 163, 164, 5, 3, 
		    0, 0, 164, 165, 5, 95, 0, 0, 165, 166, 5, 86, 0, 0, 166, 167, 3, 42, 
		    21, 0, 167, 168, 5, 83, 0, 0, 168, 11, 1, 0, 0, 0, 169, 170, 5, 95, 
		    0, 0, 170, 171, 5, 86, 0, 0, 171, 172, 3, 42, 21, 0, 172, 173, 5, 
		    83, 0, 0, 173, 13, 1, 0, 0, 0, 174, 175, 5, 63, 0, 0, 175, 176, 5, 
		    95, 0, 0, 176, 180, 5, 4, 0, 0, 177, 179, 3, 16, 8, 0, 178, 177, 1, 
		    0, 0, 0, 179, 182, 1, 0, 0, 0, 180, 178, 1, 0, 0, 0, 180, 181, 1, 
		    0, 0, 0, 181, 183, 1, 0, 0, 0, 182, 180, 1, 0, 0, 0, 183, 184, 5, 
		    5, 0, 0, 184, 15, 1, 0, 0, 0, 185, 188, 3, 18, 9, 0, 186, 188, 3, 
		    22, 11, 0, 187, 185, 1, 0, 0, 0, 187, 186, 1, 0, 0, 0, 188, 17, 1, 
		    0, 0, 0, 189, 190, 3, 110, 55, 0, 190, 194, 5, 95, 0, 0, 191, 193, 
		    3, 20, 10, 0, 192, 191, 1, 0, 0, 0, 193, 196, 1, 0, 0, 0, 194, 192, 
		    1, 0, 0, 0, 194, 195, 1, 0, 0, 0, 195, 197, 1, 0, 0, 0, 196, 194, 
		    1, 0, 0, 0, 197, 198, 5, 83, 0, 0, 198, 19, 1, 0, 0, 0, 199, 209, 
		    5, 6, 0, 0, 200, 209, 5, 7, 0, 0, 201, 209, 5, 8, 0, 0, 202, 209, 
		    5, 9, 0, 0, 203, 204, 5, 10, 0, 0, 204, 205, 5, 11, 0, 0, 205, 206, 
		    3, 42, 21, 0, 206, 207, 5, 12, 0, 0, 207, 209, 1, 0, 0, 0, 208, 199, 
		    1, 0, 0, 0, 208, 200, 1, 0, 0, 0, 208, 201, 1, 0, 0, 0, 208, 202, 
		    1, 0, 0, 0, 208, 203, 1, 0, 0, 0, 209, 21, 1, 0, 0, 0, 210, 211, 5, 
		    13, 0, 0, 211, 212, 5, 95, 0, 0, 212, 223, 5, 83, 0, 0, 213, 214, 
		    5, 14, 0, 0, 214, 215, 5, 95, 0, 0, 215, 223, 5, 83, 0, 0, 216, 217, 
		    5, 15, 0, 0, 217, 218, 5, 95, 0, 0, 218, 223, 5, 83, 0, 0, 219, 220, 
		    5, 16, 0, 0, 220, 221, 5, 95, 0, 0, 221, 223, 5, 83, 0, 0, 222, 210, 
		    1, 0, 0, 0, 222, 213, 1, 0, 0, 0, 222, 216, 1, 0, 0, 0, 222, 219, 
		    1, 0, 0, 0, 223, 23, 1, 0, 0, 0, 224, 225, 5, 64, 0, 0, 225, 226, 
		    5, 95, 0, 0, 226, 228, 5, 4, 0, 0, 227, 229, 3, 26, 13, 0, 228, 227, 
		    1, 0, 0, 0, 229, 230, 1, 0, 0, 0, 230, 228, 1, 0, 0, 0, 230, 231, 
		    1, 0, 0, 0, 231, 232, 1, 0, 0, 0, 232, 233, 5, 5, 0, 0, 233, 25, 1, 
		    0, 0, 0, 234, 235, 3, 28, 14, 0, 235, 27, 1, 0, 0, 0, 236, 237, 5, 
		    66, 0, 0, 237, 238, 5, 92, 0, 0, 238, 240, 5, 11, 0, 0, 239, 241, 
		    3, 30, 15, 0, 240, 239, 1, 0, 0, 0, 240, 241, 1, 0, 0, 0, 241, 242, 
		    1, 0, 0, 0, 242, 243, 5, 12, 0, 0, 243, 244, 3, 34, 17, 0, 244, 29, 
		    1, 0, 0, 0, 245, 250, 3, 32, 16, 0, 246, 247, 5, 82, 0, 0, 247, 249, 
		    3, 32, 16, 0, 248, 246, 1, 0, 0, 0, 249, 252, 1, 0, 0, 0, 250, 248, 
		    1, 0, 0, 0, 250, 251, 1, 0, 0, 0, 251, 31, 1, 0, 0, 0, 252, 250, 1, 
		    0, 0, 0, 253, 256, 3, 110, 55, 0, 254, 256, 5, 95, 0, 0, 255, 253, 
		    1, 0, 0, 0, 255, 254, 1, 0, 0, 0, 256, 257, 1, 0, 0, 0, 257, 258, 
		    5, 95, 0, 0, 258, 33, 1, 0, 0, 0, 259, 263, 5, 4, 0, 0, 260, 262, 
		    3, 8, 4, 0, 261, 260, 1, 0, 0, 0, 262, 265, 1, 0, 0, 0, 263, 261, 
		    1, 0, 0, 0, 263, 264, 1, 0, 0, 0, 264, 266, 1, 0, 0, 0, 265, 263, 
		    1, 0, 0, 0, 266, 267, 5, 5, 0, 0, 267, 35, 1, 0, 0, 0, 268, 269, 5, 
		    65, 0, 0, 269, 270, 5, 95, 0, 0, 270, 272, 5, 4, 0, 0, 271, 273, 3, 
		    38, 19, 0, 272, 271, 1, 0, 0, 0, 273, 274, 1, 0, 0, 0, 274, 272, 1, 
		    0, 0, 0, 274, 275, 1, 0, 0, 0, 275, 276, 1, 0, 0, 0, 276, 277, 5, 
		    5, 0, 0, 277, 37, 1, 0, 0, 0, 278, 279, 5, 66, 0, 0, 279, 280, 5, 
		    17, 0, 0, 280, 282, 5, 11, 0, 0, 281, 283, 3, 30, 15, 0, 282, 281, 
		    1, 0, 0, 0, 282, 283, 1, 0, 0, 0, 283, 284, 1, 0, 0, 0, 284, 285, 
		    5, 12, 0, 0, 285, 286, 3, 34, 17, 0, 286, 39, 1, 0, 0, 0, 287, 288, 
		    3, 42, 21, 0, 288, 289, 5, 83, 0, 0, 289, 41, 1, 0, 0, 0, 290, 291, 
		    3, 44, 22, 0, 291, 43, 1, 0, 0, 0, 292, 297, 3, 46, 23, 0, 293, 294, 
		    5, 89, 0, 0, 294, 296, 3, 46, 23, 0, 295, 293, 1, 0, 0, 0, 296, 299, 
		    1, 0, 0, 0, 297, 295, 1, 0, 0, 0, 297, 298, 1, 0, 0, 0, 298, 45, 1, 
		    0, 0, 0, 299, 297, 1, 0, 0, 0, 300, 305, 3, 48, 24, 0, 301, 302, 5, 
		    90, 0, 0, 302, 304, 3, 48, 24, 0, 303, 301, 1, 0, 0, 0, 304, 307, 
		    1, 0, 0, 0, 305, 303, 1, 0, 0, 0, 305, 306, 1, 0, 0, 0, 306, 47, 1, 
		    0, 0, 0, 307, 305, 1, 0, 0, 0, 308, 313, 3, 50, 25, 0, 309, 310, 7, 
		    0, 0, 0, 310, 312, 3, 50, 25, 0, 311, 309, 1, 0, 0, 0, 312, 315, 1, 
		    0, 0, 0, 313, 311, 1, 0, 0, 0, 313, 314, 1, 0, 0, 0, 314, 49, 1, 0, 
		    0, 0, 315, 313, 1, 0, 0, 0, 316, 321, 3, 52, 26, 0, 317, 318, 7, 1, 
		    0, 0, 318, 320, 3, 52, 26, 0, 319, 317, 1, 0, 0, 0, 320, 323, 1, 0, 
		    0, 0, 321, 319, 1, 0, 0, 0, 321, 322, 1, 0, 0, 0, 322, 51, 1, 0, 0, 
		    0, 323, 321, 1, 0, 0, 0, 324, 329, 3, 54, 27, 0, 325, 326, 7, 2, 0, 
		    0, 326, 328, 3, 54, 27, 0, 327, 325, 1, 0, 0, 0, 328, 331, 1, 0, 0, 
		    0, 329, 327, 1, 0, 0, 0, 329, 330, 1, 0, 0, 0, 330, 53, 1, 0, 0, 0, 
		    331, 329, 1, 0, 0, 0, 332, 337, 3, 56, 28, 0, 333, 334, 7, 3, 0, 0, 
		    334, 336, 3, 56, 28, 0, 335, 333, 1, 0, 0, 0, 336, 339, 1, 0, 0, 0, 
		    337, 335, 1, 0, 0, 0, 337, 338, 1, 0, 0, 0, 338, 55, 1, 0, 0, 0, 339, 
		    337, 1, 0, 0, 0, 340, 341, 5, 29, 0, 0, 341, 344, 3, 56, 28, 0, 342, 
		    344, 3, 58, 29, 0, 343, 340, 1, 0, 0, 0, 343, 342, 1, 0, 0, 0, 344, 
		    57, 1, 0, 0, 0, 345, 346, 5, 11, 0, 0, 346, 347, 3, 42, 21, 0, 347, 
		    348, 5, 12, 0, 0, 348, 364, 1, 0, 0, 0, 349, 364, 3, 74, 37, 0, 350, 
		    364, 3, 76, 38, 0, 351, 364, 3, 112, 56, 0, 352, 364, 3, 66, 33, 0, 
		    353, 364, 3, 80, 40, 0, 354, 364, 3, 78, 39, 0, 355, 364, 3, 64, 32, 
		    0, 356, 364, 5, 97, 0, 0, 357, 364, 5, 96, 0, 0, 358, 364, 5, 30, 
		    0, 0, 359, 364, 5, 31, 0, 0, 360, 364, 5, 32, 0, 0, 361, 364, 3, 70, 
		    35, 0, 362, 364, 3, 60, 30, 0, 363, 345, 1, 0, 0, 0, 363, 349, 1, 
		    0, 0, 0, 363, 350, 1, 0, 0, 0, 363, 351, 1, 0, 0, 0, 363, 352, 1, 
		    0, 0, 0, 363, 353, 1, 0, 0, 0, 363, 354, 1, 0, 0, 0, 363, 355, 1, 
		    0, 0, 0, 363, 356, 1, 0, 0, 0, 363, 357, 1, 0, 0, 0, 363, 358, 1, 
		    0, 0, 0, 363, 359, 1, 0, 0, 0, 363, 360, 1, 0, 0, 0, 363, 361, 1, 
		    0, 0, 0, 363, 362, 1, 0, 0, 0, 364, 59, 1, 0, 0, 0, 365, 366, 5, 80, 
		    0, 0, 366, 367, 5, 95, 0, 0, 367, 369, 5, 11, 0, 0, 368, 370, 3, 68, 
		    34, 0, 369, 368, 1, 0, 0, 0, 369, 370, 1, 0, 0, 0, 370, 371, 1, 0, 
		    0, 0, 371, 372, 5, 12, 0, 0, 372, 61, 1, 0, 0, 0, 373, 375, 5, 67, 
		    0, 0, 374, 376, 3, 42, 21, 0, 375, 374, 1, 0, 0, 0, 375, 376, 1, 0, 
		    0, 0, 376, 377, 1, 0, 0, 0, 377, 378, 5, 83, 0, 0, 378, 63, 1, 0, 
		    0, 0, 379, 397, 5, 95, 0, 0, 380, 381, 5, 85, 0, 0, 381, 387, 5, 95, 
		    0, 0, 382, 383, 5, 33, 0, 0, 383, 384, 3, 42, 21, 0, 384, 385, 5, 
		    34, 0, 0, 385, 387, 1, 0, 0, 0, 386, 380, 1, 0, 0, 0, 386, 382, 1, 
		    0, 0, 0, 387, 393, 1, 0, 0, 0, 388, 390, 5, 11, 0, 0, 389, 391, 3, 
		    68, 34, 0, 390, 389, 1, 0, 0, 0, 390, 391, 1, 0, 0, 0, 391, 392, 1, 
		    0, 0, 0, 392, 394, 5, 12, 0, 0, 393, 388, 1, 0, 0, 0, 393, 394, 1, 
		    0, 0, 0, 394, 396, 1, 0, 0, 0, 395, 386, 1, 0, 0, 0, 396, 399, 1, 
		    0, 0, 0, 397, 395, 1, 0, 0, 0, 397, 398, 1, 0, 0, 0, 398, 65, 1, 0, 
		    0, 0, 399, 397, 1, 0, 0, 0, 400, 401, 5, 95, 0, 0, 401, 403, 5, 11, 
		    0, 0, 402, 404, 3, 68, 34, 0, 403, 402, 1, 0, 0, 0, 403, 404, 1, 0, 
		    0, 0, 404, 405, 1, 0, 0, 0, 405, 406, 5, 12, 0, 0, 406, 67, 1, 0, 
		    0, 0, 407, 412, 3, 42, 21, 0, 408, 409, 5, 82, 0, 0, 409, 411, 3, 
		    42, 21, 0, 410, 408, 1, 0, 0, 0, 411, 414, 1, 0, 0, 0, 412, 410, 1, 
		    0, 0, 0, 412, 413, 1, 0, 0, 0, 413, 69, 1, 0, 0, 0, 414, 412, 1, 0, 
		    0, 0, 415, 416, 5, 33, 0, 0, 416, 421, 3, 72, 36, 0, 417, 418, 5, 
		    82, 0, 0, 418, 420, 3, 72, 36, 0, 419, 417, 1, 0, 0, 0, 420, 423, 
		    1, 0, 0, 0, 421, 419, 1, 0, 0, 0, 421, 422, 1, 0, 0, 0, 422, 425, 
		    1, 0, 0, 0, 423, 421, 1, 0, 0, 0, 424, 426, 5, 82, 0, 0, 425, 424, 
		    1, 0, 0, 0, 425, 426, 1, 0, 0, 0, 426, 427, 1, 0, 0, 0, 427, 428, 
		    5, 34, 0, 0, 428, 71, 1, 0, 0, 0, 429, 432, 3, 42, 21, 0, 430, 431, 
		    5, 88, 0, 0, 431, 433, 3, 42, 21, 0, 432, 430, 1, 0, 0, 0, 432, 433, 
		    1, 0, 0, 0, 433, 73, 1, 0, 0, 0, 434, 435, 5, 35, 0, 0, 435, 436, 
		    5, 11, 0, 0, 436, 437, 3, 42, 21, 0, 437, 438, 5, 82, 0, 0, 438, 441, 
		    3, 42, 21, 0, 439, 440, 5, 82, 0, 0, 440, 442, 3, 42, 21, 0, 441, 
		    439, 1, 0, 0, 0, 441, 442, 1, 0, 0, 0, 442, 443, 1, 0, 0, 0, 443, 
		    444, 5, 12, 0, 0, 444, 456, 1, 0, 0, 0, 445, 446, 5, 36, 0, 0, 446, 
		    447, 5, 11, 0, 0, 447, 448, 3, 42, 21, 0, 448, 449, 5, 12, 0, 0, 449, 
		    456, 1, 0, 0, 0, 450, 451, 5, 37, 0, 0, 451, 452, 5, 11, 0, 0, 452, 
		    453, 3, 42, 21, 0, 453, 454, 5, 12, 0, 0, 454, 456, 1, 0, 0, 0, 455, 
		    434, 1, 0, 0, 0, 455, 445, 1, 0, 0, 0, 455, 450, 1, 0, 0, 0, 456, 
		    75, 1, 0, 0, 0, 457, 458, 5, 38, 0, 0, 458, 459, 5, 11, 0, 0, 459, 
		    460, 3, 42, 21, 0, 460, 461, 5, 82, 0, 0, 461, 464, 3, 42, 21, 0, 
		    462, 463, 5, 82, 0, 0, 463, 465, 3, 42, 21, 0, 464, 462, 1, 0, 0, 
		    0, 464, 465, 1, 0, 0, 0, 465, 466, 1, 0, 0, 0, 466, 467, 5, 12, 0, 
		    0, 467, 479, 1, 0, 0, 0, 468, 469, 5, 39, 0, 0, 469, 470, 5, 11, 0, 
		    0, 470, 471, 3, 42, 21, 0, 471, 472, 5, 12, 0, 0, 472, 479, 1, 0, 
		    0, 0, 473, 474, 5, 40, 0, 0, 474, 475, 5, 11, 0, 0, 475, 476, 3, 42, 
		    21, 0, 476, 477, 5, 12, 0, 0, 477, 479, 1, 0, 0, 0, 478, 457, 1, 0, 
		    0, 0, 478, 468, 1, 0, 0, 0, 478, 473, 1, 0, 0, 0, 479, 77, 1, 0, 0, 
		    0, 480, 481, 5, 41, 0, 0, 481, 482, 5, 11, 0, 0, 482, 483, 3, 42, 
		    21, 0, 483, 484, 5, 82, 0, 0, 484, 487, 3, 42, 21, 0, 485, 486, 5, 
		    82, 0, 0, 486, 488, 3, 42, 21, 0, 487, 485, 1, 0, 0, 0, 487, 488, 
		    1, 0, 0, 0, 488, 489, 1, 0, 0, 0, 489, 490, 5, 12, 0, 0, 490, 503, 
		    1, 0, 0, 0, 491, 492, 5, 42, 0, 0, 492, 493, 5, 11, 0, 0, 493, 494, 
		    3, 42, 21, 0, 494, 495, 5, 82, 0, 0, 495, 498, 3, 42, 21, 0, 496, 
		    497, 5, 82, 0, 0, 497, 499, 3, 42, 21, 0, 498, 496, 1, 0, 0, 0, 498, 
		    499, 1, 0, 0, 0, 499, 500, 1, 0, 0, 0, 500, 501, 5, 12, 0, 0, 501, 
		    503, 1, 0, 0, 0, 502, 480, 1, 0, 0, 0, 502, 491, 1, 0, 0, 0, 503, 
		    79, 1, 0, 0, 0, 504, 505, 5, 43, 0, 0, 505, 507, 5, 11, 0, 0, 506, 
		    508, 3, 68, 34, 0, 507, 506, 1, 0, 0, 0, 507, 508, 1, 0, 0, 0, 508, 
		    509, 1, 0, 0, 0, 509, 545, 5, 12, 0, 0, 510, 511, 5, 44, 0, 0, 511, 
		    513, 5, 11, 0, 0, 512, 514, 3, 68, 34, 0, 513, 512, 1, 0, 0, 0, 513, 
		    514, 1, 0, 0, 0, 514, 515, 1, 0, 0, 0, 515, 545, 5, 12, 0, 0, 516, 
		    517, 5, 45, 0, 0, 517, 519, 5, 11, 0, 0, 518, 520, 3, 68, 34, 0, 519, 
		    518, 1, 0, 0, 0, 519, 520, 1, 0, 0, 0, 520, 521, 1, 0, 0, 0, 521, 
		    545, 5, 12, 0, 0, 522, 523, 5, 46, 0, 0, 523, 525, 5, 11, 0, 0, 524, 
		    526, 3, 68, 34, 0, 525, 524, 1, 0, 0, 0, 525, 526, 1, 0, 0, 0, 526, 
		    527, 1, 0, 0, 0, 527, 545, 5, 12, 0, 0, 528, 529, 5, 47, 0, 0, 529, 
		    530, 5, 11, 0, 0, 530, 533, 3, 42, 21, 0, 531, 532, 5, 82, 0, 0, 532, 
		    534, 3, 42, 21, 0, 533, 531, 1, 0, 0, 0, 533, 534, 1, 0, 0, 0, 534, 
		    535, 1, 0, 0, 0, 535, 536, 5, 12, 0, 0, 536, 545, 1, 0, 0, 0, 537, 
		    538, 5, 48, 0, 0, 538, 539, 5, 11, 0, 0, 539, 540, 3, 42, 21, 0, 540, 
		    541, 5, 82, 0, 0, 541, 542, 3, 42, 21, 0, 542, 543, 5, 12, 0, 0, 543, 
		    545, 1, 0, 0, 0, 544, 504, 1, 0, 0, 0, 544, 510, 1, 0, 0, 0, 544, 
		    516, 1, 0, 0, 0, 544, 522, 1, 0, 0, 0, 544, 528, 1, 0, 0, 0, 544, 
		    537, 1, 0, 0, 0, 545, 81, 1, 0, 0, 0, 546, 547, 5, 62, 0, 0, 547, 
		    548, 5, 94, 0, 0, 548, 549, 5, 97, 0, 0, 549, 550, 5, 87, 0, 0, 550, 
		    552, 3, 86, 43, 0, 551, 553, 3, 84, 42, 0, 552, 551, 1, 0, 0, 0, 552, 
		    553, 1, 0, 0, 0, 553, 554, 1, 0, 0, 0, 554, 555, 5, 83, 0, 0, 555, 
		    83, 1, 0, 0, 0, 556, 557, 5, 65, 0, 0, 557, 562, 5, 95, 0, 0, 558, 
		    559, 5, 82, 0, 0, 559, 561, 5, 95, 0, 0, 560, 558, 1, 0, 0, 0, 561, 
		    564, 1, 0, 0, 0, 562, 560, 1, 0, 0, 0, 562, 563, 1, 0, 0, 0, 563, 
		    85, 1, 0, 0, 0, 564, 562, 1, 0, 0, 0, 565, 566, 5, 91, 0, 0, 566, 
		    87, 1, 0, 0, 0, 567, 568, 5, 49, 0, 0, 568, 569, 5, 11, 0, 0, 569, 
		    570, 5, 95, 0, 0, 570, 571, 5, 81, 0, 0, 571, 572, 3, 42, 21, 0, 572, 
		    573, 5, 12, 0, 0, 573, 574, 3, 34, 17, 0, 574, 89, 1, 0, 0, 0, 575, 
		    576, 5, 71, 0, 0, 576, 577, 5, 11, 0, 0, 577, 578, 3, 10, 5, 0, 578, 
		    579, 3, 42, 21, 0, 579, 580, 5, 83, 0, 0, 580, 581, 3, 12, 6, 0, 581, 
		    582, 5, 12, 0, 0, 582, 583, 3, 34, 17, 0, 583, 91, 1, 0, 0, 0, 584, 
		    585, 5, 72, 0, 0, 585, 586, 5, 11, 0, 0, 586, 587, 3, 42, 21, 0, 587, 
		    588, 5, 12, 0, 0, 588, 589, 3, 34, 17, 0, 589, 93, 1, 0, 0, 0, 590, 
		    591, 5, 73, 0, 0, 591, 592, 5, 83, 0, 0, 592, 95, 1, 0, 0, 0, 593, 
		    594, 5, 74, 0, 0, 594, 595, 5, 83, 0, 0, 595, 97, 1, 0, 0, 0, 596, 
		    597, 5, 75, 0, 0, 597, 598, 3, 34, 17, 0, 598, 599, 5, 76, 0, 0, 599, 
		    600, 5, 11, 0, 0, 600, 601, 5, 95, 0, 0, 601, 602, 5, 95, 0, 0, 602, 
		    603, 5, 12, 0, 0, 603, 604, 3, 34, 17, 0, 604, 99, 1, 0, 0, 0, 605, 
		    606, 5, 77, 0, 0, 606, 607, 5, 95, 0, 0, 607, 609, 5, 11, 0, 0, 608, 
		    610, 3, 42, 21, 0, 609, 608, 1, 0, 0, 0, 609, 610, 1, 0, 0, 0, 610, 
		    611, 1, 0, 0, 0, 611, 612, 5, 12, 0, 0, 612, 613, 5, 83, 0, 0, 613, 
		    101, 1, 0, 0, 0, 614, 615, 5, 78, 0, 0, 615, 616, 3, 70, 35, 0, 616, 
		    617, 5, 83, 0, 0, 617, 103, 1, 0, 0, 0, 618, 619, 5, 68, 0, 0, 619, 
		    620, 5, 11, 0, 0, 620, 621, 3, 42, 21, 0, 621, 622, 5, 12, 0, 0, 622, 
		    631, 3, 34, 17, 0, 623, 624, 5, 69, 0, 0, 624, 625, 5, 11, 0, 0, 625, 
		    626, 3, 42, 21, 0, 626, 627, 5, 12, 0, 0, 627, 628, 3, 34, 17, 0, 
		    628, 630, 1, 0, 0, 0, 629, 623, 1, 0, 0, 0, 630, 633, 1, 0, 0, 0, 
		    631, 629, 1, 0, 0, 0, 631, 632, 1, 0, 0, 0, 632, 636, 1, 0, 0, 0, 
		    633, 631, 1, 0, 0, 0, 634, 635, 5, 70, 0, 0, 635, 637, 3, 34, 17, 
		    0, 636, 634, 1, 0, 0, 0, 636, 637, 1, 0, 0, 0, 637, 105, 1, 0, 0, 
		    0, 638, 639, 7, 4, 0, 0, 639, 107, 1, 0, 0, 0, 640, 641, 7, 5, 0, 
		    0, 641, 109, 1, 0, 0, 0, 642, 643, 7, 6, 0, 0, 643, 111, 1, 0, 0, 
		    0, 644, 645, 5, 95, 0, 0, 645, 646, 5, 85, 0, 0, 646, 647, 5, 93, 
		    0, 0, 647, 649, 5, 11, 0, 0, 648, 650, 3, 114, 57, 0, 649, 648, 1, 
		    0, 0, 0, 649, 650, 1, 0, 0, 0, 650, 651, 1, 0, 0, 0, 651, 652, 5, 
		    12, 0, 0, 652, 113, 1, 0, 0, 0, 653, 658, 3, 70, 35, 0, 654, 655, 
		    5, 82, 0, 0, 655, 657, 3, 70, 35, 0, 656, 654, 1, 0, 0, 0, 657, 660, 
		    1, 0, 0, 0, 658, 656, 1, 0, 0, 0, 658, 659, 1, 0, 0, 0, 659, 115, 
		    1, 0, 0, 0, 660, 658, 1, 0, 0, 0, 55, 119, 121, 141, 161, 180, 187, 
		    194, 208, 222, 230, 240, 250, 255, 263, 274, 282, 297, 305, 313, 321, 
		    329, 337, 343, 363, 369, 375, 386, 390, 393, 397, 403, 412, 421, 425, 
		    432, 441, 455, 464, 478, 487, 498, 502, 507, 513, 519, 525, 533, 544, 
		    552, 562, 609, 631, 636, 649, 658];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.2', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "OAL.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function program(): Context\ProgramContext
		{
		    $localContext = new Context\ProgramContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_program);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(121);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & -4610560136237283318) !== 0) || (((($_la - 64)) & ~0x3f) === 0 && ((1 << ($_la - 64)) & 15032512411) !== 0)) {
		        	$this->setState(119);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::T__0:
		        	    	$this->setState(116);
		        	    	$this->importStmt();
		        	    	break;

		        	    case self::REQUIRE:
		        	    	$this->setState(117);
		        	    	$this->requireStmt();
		        	    	break;

		        	    case self::T__2:
		        	    case self::T__10:
		        	    case self::T__28:
		        	    case self::T__29:
		        	    case self::T__30:
		        	    case self::T__31:
		        	    case self::T__32:
		        	    case self::T__34:
		        	    case self::T__35:
		        	    case self::T__36:
		        	    case self::T__37:
		        	    case self::T__38:
		        	    case self::T__39:
		        	    case self::T__40:
		        	    case self::T__41:
		        	    case self::T__42:
		        	    case self::T__43:
		        	    case self::T__44:
		        	    case self::T__45:
		        	    case self::T__46:
		        	    case self::T__47:
		        	    case self::T__48:
		        	    case self::ROUTE:
		        	    case self::MODEL:
		        	    case self::CONTROLLER:
		        	    case self::MIDDLEWARE:
		        	    case self::RETURN:
		        	    case self::IF:
		        	    case self::FOR:
		        	    case self::WHILE:
		        	    case self::BREAK:
		        	    case self::CONTINUE:
		        	    case self::TRY:
		        	    case self::THROW:
		        	    case self::VALIDATE:
		        	    case self::NEW:
		        	    case self::ID:
		        	    case self::NUMBER:
		        	    case self::STRING:
		        	    	$this->setState(118);
		        	    	$this->statement();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(123);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(124);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function importStmt(): Context\ImportStmtContext
		{
		    $localContext = new Context\ImportStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_importStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(126);
		        $this->match(self::T__0);
		        $this->setState(127);
		        $this->match(self::ID);
		        $this->setState(128);
		        $this->match(self::T__1);
		        $this->setState(129);
		        $this->idPath();
		        $this->setState(130);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function requireStmt(): Context\RequireStmtContext
		{
		    $localContext = new Context\RequireStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_requireStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(132);
		        $this->match(self::REQUIRE);
		        $this->setState(133);
		        $this->match(self::STRING);
		        $this->setState(134);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function idPath(): Context\IdPathContext
		{
		    $localContext = new Context\IdPathContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_idPath);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(136);
		        $this->match(self::ID);
		        $this->setState(141);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::DOT) {
		        	$this->setState(137);
		        	$this->match(self::DOT);
		        	$this->setState(138);
		        	$this->match(self::ID);
		        	$this->setState(143);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function statement(): Context\StatementContext
		{
		    $localContext = new Context\StatementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_statement);

		    try {
		        $this->setState(161);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 3, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(144);
		        	    $this->varStmt();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(145);
		        	    $this->assignmentStmt();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(146);
		        	    $this->modelStmt();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(147);
		        	    $this->controllerStmt();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(148);
		        	    $this->routeStmt();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(149);
		        	    $this->middlewareStmt();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(150);
		        	    $this->ifStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(151);
		        	    $this->foreachStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(152);
		        	    $this->forStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(153);
		        	    $this->whileStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(154);
		        	    $this->breakStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(155);
		        	    $this->continueStmt();
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(156);
		        	    $this->tryCatchStmt();
		        	break;

		        	case 14:
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(157);
		        	    $this->throwStmt();
		        	break;

		        	case 15:
		        	    $this->enterOuterAlt($localContext, 15);
		        	    $this->setState(158);
		        	    $this->validateStmt();
		        	break;

		        	case 16:
		        	    $this->enterOuterAlt($localContext, 16);
		        	    $this->setState(159);
		        	    $this->expressionStmt();
		        	break;

		        	case 17:
		        	    $this->enterOuterAlt($localContext, 17);
		        	    $this->setState(160);
		        	    $this->returnStmt();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function varStmt(): Context\VarStmtContext
		{
		    $localContext = new Context\VarStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_varStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(163);
		        $this->match(self::T__2);
		        $this->setState(164);
		        $this->match(self::ID);
		        $this->setState(165);
		        $this->match(self::EQUAL);
		        $this->setState(166);
		        $this->expression();
		        $this->setState(167);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assignmentStmt(): Context\AssignmentStmtContext
		{
		    $localContext = new Context\AssignmentStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_assignmentStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(169);
		        $this->match(self::ID);
		        $this->setState(170);
		        $this->match(self::EQUAL);
		        $this->setState(171);
		        $this->expression();
		        $this->setState(172);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function modelStmt(): Context\ModelStmtContext
		{
		    $localContext = new Context\ModelStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_modelStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(174);
		        $this->match(self::MODEL);
		        $this->setState(175);
		        $this->match(self::ID);
		        $this->setState(176);
		        $this->match(self::T__3);
		        $this->setState(180);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 4610560118520668160) !== 0)) {
		        	$this->setState(177);
		        	$this->modelBody();
		        	$this->setState(182);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(183);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function modelBody(): Context\ModelBodyContext
		{
		    $localContext = new Context\ModelBodyContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_modelBody);

		    try {
		        $this->setState(187);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::STRING_TYPE:
		            case self::TEXT_TYPE:
		            case self::INTEGER_TYPE:
		            case self::BIGINTEGER_TYPE:
		            case self::FLOAT_TYPE:
		            case self::DOUBLE_TYPE:
		            case self::DECIMAL_TYPE:
		            case self::BOOLEAN_TYPE:
		            case self::DATE_TYPE:
		            case self::DATETIME_TYPE:
		            case self::TIME_TYPE:
		            case self::TIMESTAMP_TYPE:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(185);
		            	$this->field();
		            	break;

		            case self::T__12:
		            case self::T__13:
		            case self::T__14:
		            case self::T__15:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(186);
		            	$this->relation();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function field(): Context\FieldContext
		{
		    $localContext = new Context\FieldContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_field);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(189);
		        $this->oalType();
		        $this->setState(190);
		        $this->match(self::ID);
		        $this->setState(194);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1984) !== 0)) {
		        	$this->setState(191);
		        	$this->fieldModifier();
		        	$this->setState(196);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(197);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function fieldModifier(): Context\FieldModifierContext
		{
		    $localContext = new Context\FieldModifierContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_fieldModifier);

		    try {
		        $this->setState(208);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__5:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(199);
		            	$this->match(self::T__5);
		            	break;

		            case self::T__6:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(200);
		            	$this->match(self::T__6);
		            	break;

		            case self::T__7:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(201);
		            	$this->match(self::T__7);
		            	break;

		            case self::T__8:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(202);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__9:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(203);
		            	$this->match(self::T__9);
		            	$this->setState(204);
		            	$this->match(self::T__10);
		            	$this->setState(205);
		            	$this->expression();
		            	$this->setState(206);
		            	$this->match(self::T__11);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function relation(): Context\RelationContext
		{
		    $localContext = new Context\RelationContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_relation);

		    try {
		        $this->setState(222);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__12:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(210);
		            	$this->match(self::T__12);
		            	$this->setState(211);
		            	$this->match(self::ID);
		            	$this->setState(212);
		            	$this->match(self::SEMICOLON);
		            	break;

		            case self::T__13:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(213);
		            	$this->match(self::T__13);
		            	$this->setState(214);
		            	$this->match(self::ID);
		            	$this->setState(215);
		            	$this->match(self::SEMICOLON);
		            	break;

		            case self::T__14:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(216);
		            	$this->match(self::T__14);
		            	$this->setState(217);
		            	$this->match(self::ID);
		            	$this->setState(218);
		            	$this->match(self::SEMICOLON);
		            	break;

		            case self::T__15:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(219);
		            	$this->match(self::T__15);
		            	$this->setState(220);
		            	$this->match(self::ID);
		            	$this->setState(221);
		            	$this->match(self::SEMICOLON);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function controllerStmt(): Context\ControllerStmtContext
		{
		    $localContext = new Context\ControllerStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_controllerStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(224);
		        $this->match(self::CONTROLLER);
		        $this->setState(225);
		        $this->match(self::ID);
		        $this->setState(226);
		        $this->match(self::T__3);
		        $this->setState(228); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(227);
		        	$this->controllerBody();
		        	$this->setState(230); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::FUNCTION);
		        $this->setState(232);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function controllerBody(): Context\ControllerBodyContext
		{
		    $localContext = new Context\ControllerBodyContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_controllerBody);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(234);
		        $this->controllerMethod();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function controllerMethod(): Context\ControllerMethodContext
		{
		    $localContext = new Context\ControllerMethodContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_controllerMethod);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(236);
		        $this->match(self::FUNCTION);
		        $this->setState(237);
		        $this->match(self::CONTROLLER_METHOD_NAME);
		        $this->setState(238);
		        $this->match(self::T__10);
		        $this->setState(240);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 50)) & ~0x3f) === 0 && ((1 << ($_la - 50)) & 35184372092927) !== 0)) {
		        	$this->setState(239);
		        	$this->parameterList();
		        }
		        $this->setState(242);
		        $this->match(self::T__11);
		        $this->setState(243);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function parameterList(): Context\ParameterListContext
		{
		    $localContext = new Context\ParameterListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_parameterList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(245);
		        $this->parameter();
		        $this->setState(250);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(246);
		        	$this->match(self::COMMA);
		        	$this->setState(247);
		        	$this->parameter();
		        	$this->setState(252);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function parameter(): Context\ParameterContext
		{
		    $localContext = new Context\ParameterContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_parameter);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(255);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::STRING_TYPE:
		            case self::TEXT_TYPE:
		            case self::INTEGER_TYPE:
		            case self::BIGINTEGER_TYPE:
		            case self::FLOAT_TYPE:
		            case self::DOUBLE_TYPE:
		            case self::DECIMAL_TYPE:
		            case self::BOOLEAN_TYPE:
		            case self::DATE_TYPE:
		            case self::DATETIME_TYPE:
		            case self::TIME_TYPE:
		            case self::TIMESTAMP_TYPE:
		            	$this->setState(253);
		            	$this->oalType();
		            	break;

		            case self::ID:
		            	$this->setState(254);
		            	$this->match(self::ID);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		        $this->setState(257);
		        $this->match(self::ID);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function block(): Context\BlockContext
		{
		    $localContext = new Context\BlockContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(259);
		        $this->match(self::T__3);
		        $this->setState(263);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & -4610560136237283320) !== 0) || (((($_la - 64)) & ~0x3f) === 0 && ((1 << ($_la - 64)) & 15032479643) !== 0)) {
		        	$this->setState(260);
		        	$this->statement();
		        	$this->setState(265);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(266);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function middlewareStmt(): Context\MiddlewareStmtContext
		{
		    $localContext = new Context\MiddlewareStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_middlewareStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(268);
		        $this->match(self::MIDDLEWARE);
		        $this->setState(269);
		        $this->match(self::ID);
		        $this->setState(270);
		        $this->match(self::T__3);
		        $this->setState(272); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(271);
		        	$this->middlewareMethod();
		        	$this->setState(274); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::FUNCTION);
		        $this->setState(276);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function middlewareMethod(): Context\MiddlewareMethodContext
		{
		    $localContext = new Context\MiddlewareMethodContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_middlewareMethod);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(278);
		        $this->match(self::FUNCTION);
		        $this->setState(279);
		        $this->match(self::T__16);
		        $this->setState(280);
		        $this->match(self::T__10);
		        $this->setState(282);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 50)) & ~0x3f) === 0 && ((1 << ($_la - 50)) & 35184372092927) !== 0)) {
		        	$this->setState(281);
		        	$this->parameterList();
		        }
		        $this->setState(284);
		        $this->match(self::T__11);
		        $this->setState(285);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expressionStmt(): Context\ExpressionStmtContext
		{
		    $localContext = new Context\ExpressionStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_expressionStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(287);
		        $this->expression();
		        $this->setState(288);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression(): Context\ExpressionContext
		{
		    $localContext = new Context\ExpressionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(290);
		        $this->logicalOrExpr();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicalOrExpr(): Context\LogicalOrExprContext
		{
		    $localContext = new Context\LogicalOrExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_logicalOrExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(292);
		        $this->logicalAndExpr();
		        $this->setState(297);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::OR) {
		        	$this->setState(293);
		        	$this->match(self::OR);
		        	$this->setState(294);
		        	$this->logicalAndExpr();
		        	$this->setState(299);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicalAndExpr(): Context\LogicalAndExprContext
		{
		    $localContext = new Context\LogicalAndExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_logicalAndExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(300);
		        $this->equalityExpr();
		        $this->setState(305);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::AND) {
		        	$this->setState(301);
		        	$this->match(self::AND);
		        	$this->setState(302);
		        	$this->equalityExpr();
		        	$this->setState(307);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function equalityExpr(): Context\EqualityExprContext
		{
		    $localContext = new Context\EqualityExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_equalityExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(308);
		        $this->relationalExpr();
		        $this->setState(313);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__17 || $_la === self::T__18) {
		        	$this->setState(309);

		        	$_la = $this->input->LA(1);

		        	if (!($_la === self::T__17 || $_la === self::T__18)) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(310);
		        	$this->relationalExpr();
		        	$this->setState(315);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function relationalExpr(): Context\RelationalExprContext
		{
		    $localContext = new Context\RelationalExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 50, self::RULE_relationalExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(316);
		        $this->additiveExpr();
		        $this->setState(321);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 15728640) !== 0)) {
		        	$this->setState(317);

		        	$_la = $this->input->LA(1);

		        	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 15728640) !== 0))) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(318);
		        	$this->additiveExpr();
		        	$this->setState(323);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function additiveExpr(): Context\AdditiveExprContext
		{
		    $localContext = new Context\AdditiveExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_additiveExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(324);
		        $this->multiplicativeExpr();
		        $this->setState(329);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__23 || $_la === self::T__24) {
		        	$this->setState(325);

		        	$_la = $this->input->LA(1);

		        	if (!($_la === self::T__23 || $_la === self::T__24)) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(326);
		        	$this->multiplicativeExpr();
		        	$this->setState(331);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function multiplicativeExpr(): Context\MultiplicativeExprContext
		{
		    $localContext = new Context\MultiplicativeExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_multiplicativeExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(332);
		        $this->unaryExpr();
		        $this->setState(337);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 469762048) !== 0)) {
		        	$this->setState(333);

		        	$_la = $this->input->LA(1);

		        	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 469762048) !== 0))) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(334);
		        	$this->unaryExpr();
		        	$this->setState(339);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function unaryExpr(): Context\UnaryExprContext
		{
		    $localContext = new Context\UnaryExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_unaryExpr);

		    try {
		        $this->setState(343);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__28:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(340);
		            	$this->match(self::T__28);
		            	$this->setState(341);
		            	$this->unaryExpr();
		            	break;

		            case self::T__10:
		            case self::T__29:
		            case self::T__30:
		            case self::T__31:
		            case self::T__32:
		            case self::T__34:
		            case self::T__35:
		            case self::T__36:
		            case self::T__37:
		            case self::T__38:
		            case self::T__39:
		            case self::T__40:
		            case self::T__41:
		            case self::T__42:
		            case self::T__43:
		            case self::T__44:
		            case self::T__45:
		            case self::T__46:
		            case self::T__47:
		            case self::NEW:
		            case self::ID:
		            case self::NUMBER:
		            case self::STRING:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(342);
		            	$this->atom();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function atom(): Context\AtomContext
		{
		    $localContext = new Context\AtomContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_atom);

		    try {
		        $this->setState(363);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 23, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(345);
		        	    $this->match(self::T__10);
		        	    $this->setState(346);
		        	    $this->expression();
		        	    $this->setState(347);
		        	    $this->match(self::T__11);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(349);
		        	    $this->sessionFunction();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(350);
		        	    $this->cookieFunction();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(351);
		        	    $this->modelMethodCall();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(352);
		        	    $this->functionCall();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(353);
		        	    $this->responseFunction();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(354);
		        	    $this->httpFetchFunction();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(355);
		        	    $this->idChain();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(356);
		        	    $this->match(self::STRING);
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(357);
		        	    $this->match(self::NUMBER);
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(358);
		        	    $this->match(self::T__29);
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(359);
		        	    $this->match(self::T__30);
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(360);
		        	    $this->match(self::T__31);
		        	break;

		        	case 14:
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(361);
		        	    $this->arrayLiteral();
		        	break;

		        	case 15:
		        	    $this->enterOuterAlt($localContext, 15);
		        	    $this->setState(362);
		        	    $this->newExpr();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function newExpr(): Context\NewExprContext
		{
		    $localContext = new Context\NewExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_newExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(365);
		        $this->match(self::NEW);
		        $this->setState(366);
		        $this->match(self::ID);
		        $this->setState(367);
		        $this->match(self::T__10);
		        $this->setState(369);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		        	$this->setState(368);
		        	$this->argumentList();
		        }
		        $this->setState(371);
		        $this->match(self::T__11);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnStmt(): Context\ReturnStmtContext
		{
		    $localContext = new Context\ReturnStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 62, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(373);
		        $this->match(self::RETURN);
		        $this->setState(375);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		        	$this->setState(374);
		        	$this->expression();
		        }
		        $this->setState(377);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function idChain(): Context\IdChainContext
		{
		    $localContext = new Context\IdChainContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 64, self::RULE_idChain);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(379);
		        $this->match(self::ID);
		        $this->setState(397);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__32 || $_la === self::DOT) {
		        	$this->setState(386);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::DOT:
		        	    	$this->setState(380);
		        	    	$this->match(self::DOT);
		        	    	$this->setState(381);
		        	    	$this->match(self::ID);
		        	    	break;

		        	    case self::T__32:
		        	    	$this->setState(382);
		        	    	$this->match(self::T__32);
		        	    	$this->setState(383);
		        	    	$this->expression();
		        	    	$this->setState(384);
		        	    	$this->match(self::T__33);
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(393);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);

		        	if ($_la === self::T__10) {
		        		$this->setState(388);
		        		$this->match(self::T__10);
		        		$this->setState(390);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);

		        		if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		        			$this->setState(389);
		        			$this->argumentList();
		        		}
		        		$this->setState(392);
		        		$this->match(self::T__11);
		        	}
		        	$this->setState(399);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function functionCall(): Context\FunctionCallContext
		{
		    $localContext = new Context\FunctionCallContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 66, self::RULE_functionCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(400);
		        $this->match(self::ID);
		        $this->setState(401);
		        $this->match(self::T__10);
		        $this->setState(403);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		        	$this->setState(402);
		        	$this->argumentList();
		        }
		        $this->setState(405);
		        $this->match(self::T__11);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argumentList(): Context\ArgumentListContext
		{
		    $localContext = new Context\ArgumentListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 68, self::RULE_argumentList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(407);
		        $this->expression();
		        $this->setState(412);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(408);
		        	$this->match(self::COMMA);
		        	$this->setState(409);
		        	$this->expression();
		        	$this->setState(414);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral(): Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 70, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(415);
		        $this->match(self::T__32);
		        $this->setState(416);
		        $this->arrayElement();
		        $this->setState(421);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 32, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(417);
		        		$this->match(self::COMMA);
		        		$this->setState(418);
		        		$this->arrayElement(); 
		        	}

		        	$this->setState(423);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 32, $this->ctx);
		        }
		        $this->setState(425);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::COMMA) {
		        	$this->setState(424);
		        	$this->match(self::COMMA);
		        }
		        $this->setState(427);
		        $this->match(self::T__33);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayElement(): Context\ArrayElementContext
		{
		    $localContext = new Context\ArrayElementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 72, self::RULE_arrayElement);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(429);
		        $this->expression();
		        $this->setState(432);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ARROW_ASSOC) {
		        	$this->setState(430);
		        	$this->match(self::ARROW_ASSOC);
		        	$this->setState(431);
		        	$this->expression();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function sessionFunction(): Context\SessionFunctionContext
		{
		    $localContext = new Context\SessionFunctionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 74, self::RULE_sessionFunction);

		    try {
		        $this->setState(455);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__34:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(434);
		            	$this->match(self::T__34);
		            	$this->setState(435);
		            	$this->match(self::T__10);
		            	$this->setState(436);
		            	$this->expression();
		            	$this->setState(437);
		            	$this->match(self::COMMA);
		            	$this->setState(438);
		            	$this->expression();
		            	$this->setState(441);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(439);
		            		$this->match(self::COMMA);
		            		$this->setState(440);
		            		$this->expression();
		            	}
		            	$this->setState(443);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__35:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(445);
		            	$this->match(self::T__35);
		            	$this->setState(446);
		            	$this->match(self::T__10);
		            	$this->setState(447);
		            	$this->expression();
		            	$this->setState(448);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__36:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(450);
		            	$this->match(self::T__36);
		            	$this->setState(451);
		            	$this->match(self::T__10);
		            	$this->setState(452);
		            	$this->expression();
		            	$this->setState(453);
		            	$this->match(self::T__11);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function cookieFunction(): Context\CookieFunctionContext
		{
		    $localContext = new Context\CookieFunctionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 76, self::RULE_cookieFunction);

		    try {
		        $this->setState(478);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__37:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(457);
		            	$this->match(self::T__37);
		            	$this->setState(458);
		            	$this->match(self::T__10);
		            	$this->setState(459);
		            	$this->expression();
		            	$this->setState(460);
		            	$this->match(self::COMMA);
		            	$this->setState(461);
		            	$this->expression();
		            	$this->setState(464);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(462);
		            		$this->match(self::COMMA);
		            		$this->setState(463);
		            		$this->expression();
		            	}
		            	$this->setState(466);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__38:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(468);
		            	$this->match(self::T__38);
		            	$this->setState(469);
		            	$this->match(self::T__10);
		            	$this->setState(470);
		            	$this->expression();
		            	$this->setState(471);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__39:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(473);
		            	$this->match(self::T__39);
		            	$this->setState(474);
		            	$this->match(self::T__10);
		            	$this->setState(475);
		            	$this->expression();
		            	$this->setState(476);
		            	$this->match(self::T__11);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function httpFetchFunction(): Context\HttpFetchFunctionContext
		{
		    $localContext = new Context\HttpFetchFunctionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 78, self::RULE_httpFetchFunction);

		    try {
		        $this->setState(502);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__40:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(480);
		            	$this->match(self::T__40);
		            	$this->setState(481);
		            	$this->match(self::T__10);
		            	$this->setState(482);
		            	$this->expression();
		            	$this->setState(483);
		            	$this->match(self::COMMA);
		            	$this->setState(484);
		            	$this->expression();
		            	$this->setState(487);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(485);
		            		$this->match(self::COMMA);
		            		$this->setState(486);
		            		$this->expression();
		            	}
		            	$this->setState(489);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__41:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(491);
		            	$this->match(self::T__41);
		            	$this->setState(492);
		            	$this->match(self::T__10);
		            	$this->setState(493);
		            	$this->expression();
		            	$this->setState(494);
		            	$this->match(self::COMMA);
		            	$this->setState(495);
		            	$this->expression();
		            	$this->setState(498);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(496);
		            		$this->match(self::COMMA);
		            		$this->setState(497);
		            		$this->expression();
		            	}
		            	$this->setState(500);
		            	$this->match(self::T__11);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function responseFunction(): Context\ResponseFunctionContext
		{
		    $localContext = new Context\ResponseFunctionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 80, self::RULE_responseFunction);

		    try {
		        $this->setState(544);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__42:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(504);
		            	$this->match(self::T__42);
		            	$this->setState(505);
		            	$this->match(self::T__10);
		            	$this->setState(507);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		            		$this->setState(506);
		            		$this->argumentList();
		            	}
		            	$this->setState(509);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__43:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(510);
		            	$this->match(self::T__43);
		            	$this->setState(511);
		            	$this->match(self::T__10);
		            	$this->setState(513);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		            		$this->setState(512);
		            		$this->argumentList();
		            	}
		            	$this->setState(515);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__44:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(516);
		            	$this->match(self::T__44);
		            	$this->setState(517);
		            	$this->match(self::T__10);
		            	$this->setState(519);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		            		$this->setState(518);
		            		$this->argumentList();
		            	}
		            	$this->setState(521);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__45:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(522);
		            	$this->match(self::T__45);
		            	$this->setState(523);
		            	$this->match(self::T__10);
		            	$this->setState(525);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		            		$this->setState(524);
		            		$this->argumentList();
		            	}
		            	$this->setState(527);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__46:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(528);
		            	$this->match(self::T__46);
		            	$this->setState(529);
		            	$this->match(self::T__10);
		            	$this->setState(530);
		            	$this->expression();
		            	$this->setState(533);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(531);
		            		$this->match(self::COMMA);
		            		$this->setState(532);
		            		$this->expression();
		            	}
		            	$this->setState(535);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__47:
		            	$this->enterOuterAlt($localContext, 6);
		            	$this->setState(537);
		            	$this->match(self::T__47);
		            	$this->setState(538);
		            	$this->match(self::T__10);
		            	$this->setState(539);
		            	$this->expression();
		            	$this->setState(540);
		            	$this->match(self::COMMA);
		            	$this->setState(541);
		            	$this->expression();
		            	$this->setState(542);
		            	$this->match(self::T__11);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function routeStmt(): Context\RouteStmtContext
		{
		    $localContext = new Context\RouteStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 82, self::RULE_routeStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(546);
		        $this->match(self::ROUTE);
		        $this->setState(547);
		        $this->match(self::HTTP_METHOD);
		        $this->setState(548);
		        $this->match(self::STRING);
		        $this->setState(549);
		        $this->match(self::ARROW);
		        $this->setState(550);
		        $this->controllerRef();
		        $this->setState(552);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::MIDDLEWARE) {
		        	$this->setState(551);
		        	$this->middlewareList();
		        }
		        $this->setState(554);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function middlewareList(): Context\MiddlewareListContext
		{
		    $localContext = new Context\MiddlewareListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 84, self::RULE_middlewareList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(556);
		        $this->match(self::MIDDLEWARE);
		        $this->setState(557);
		        $this->match(self::ID);
		        $this->setState(562);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(558);
		        	$this->match(self::COMMA);
		        	$this->setState(559);
		        	$this->match(self::ID);
		        	$this->setState(564);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function controllerRef(): Context\ControllerRefContext
		{
		    $localContext = new Context\ControllerRefContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 86, self::RULE_controllerRef);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(565);
		        $this->match(self::CONTROLLER_METHOD);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function foreachStmt(): Context\ForeachStmtContext
		{
		    $localContext = new Context\ForeachStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 88, self::RULE_foreachStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(567);
		        $this->match(self::T__48);
		        $this->setState(568);
		        $this->match(self::T__10);
		        $this->setState(569);
		        $this->match(self::ID);
		        $this->setState(570);
		        $this->match(self::IN);
		        $this->setState(571);
		        $this->expression();
		        $this->setState(572);
		        $this->match(self::T__11);
		        $this->setState(573);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forStmt(): Context\ForStmtContext
		{
		    $localContext = new Context\ForStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 90, self::RULE_forStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(575);
		        $this->match(self::FOR);
		        $this->setState(576);
		        $this->match(self::T__10);
		        $this->setState(577);
		        $this->varStmt();
		        $this->setState(578);
		        $this->expression();
		        $this->setState(579);
		        $this->match(self::SEMICOLON);
		        $this->setState(580);
		        $this->assignmentStmt();
		        $this->setState(581);
		        $this->match(self::T__11);
		        $this->setState(582);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function whileStmt(): Context\WhileStmtContext
		{
		    $localContext = new Context\WhileStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 92, self::RULE_whileStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(584);
		        $this->match(self::WHILE);
		        $this->setState(585);
		        $this->match(self::T__10);
		        $this->setState(586);
		        $this->expression();
		        $this->setState(587);
		        $this->match(self::T__11);
		        $this->setState(588);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function breakStmt(): Context\BreakStmtContext
		{
		    $localContext = new Context\BreakStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 94, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(590);
		        $this->match(self::BREAK);
		        $this->setState(591);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function continueStmt(): Context\ContinueStmtContext
		{
		    $localContext = new Context\ContinueStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 96, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(593);
		        $this->match(self::CONTINUE);
		        $this->setState(594);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function tryCatchStmt(): Context\TryCatchStmtContext
		{
		    $localContext = new Context\TryCatchStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 98, self::RULE_tryCatchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(596);
		        $this->match(self::TRY);
		        $this->setState(597);
		        $this->block();
		        $this->setState(598);
		        $this->match(self::CATCH);
		        $this->setState(599);
		        $this->match(self::T__10);
		        $this->setState(600);
		        $this->match(self::ID);
		        $this->setState(601);
		        $this->match(self::ID);
		        $this->setState(602);
		        $this->match(self::T__11);
		        $this->setState(603);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function throwStmt(): Context\ThrowStmtContext
		{
		    $localContext = new Context\ThrowStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 100, self::RULE_throwStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(605);
		        $this->match(self::THROW);
		        $this->setState(606);
		        $this->match(self::ID);
		        $this->setState(607);
		        $this->match(self::T__10);
		        $this->setState(609);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562932236683264) !== 0) || (((($_la - 80)) & ~0x3f) === 0 && ((1 << ($_la - 80)) & 229377) !== 0)) {
		        	$this->setState(608);
		        	$this->expression();
		        }
		        $this->setState(611);
		        $this->match(self::T__11);
		        $this->setState(612);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function validateStmt(): Context\ValidateStmtContext
		{
		    $localContext = new Context\ValidateStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 102, self::RULE_validateStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(614);
		        $this->match(self::VALIDATE);
		        $this->setState(615);
		        $this->arrayLiteral();
		        $this->setState(616);
		        $this->match(self::SEMICOLON);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function ifStmt(): Context\IfStmtContext
		{
		    $localContext = new Context\IfStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 104, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(618);
		        $this->match(self::IF);
		        $this->setState(619);
		        $this->match(self::T__10);
		        $this->setState(620);
		        $this->expression();
		        $this->setState(621);
		        $this->match(self::T__11);
		        $this->setState(622);
		        $this->block();
		        $this->setState(631);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::ELSEIF) {
		        	$this->setState(623);
		        	$this->match(self::ELSEIF);
		        	$this->setState(624);
		        	$this->match(self::T__10);
		        	$this->setState(625);
		        	$this->expression();
		        	$this->setState(626);
		        	$this->match(self::T__11);
		        	$this->setState(627);
		        	$this->block();
		        	$this->setState(633);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(636);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(634);
		        	$this->match(self::ELSE);
		        	$this->setState(635);
		        	$this->block();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function comparisonOperator(): Context\ComparisonOperatorContext
		{
		    $localContext = new Context\ComparisonOperatorContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 106, self::RULE_comparisonOperator);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(638);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 16515072) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicalOperator(): Context\LogicalOperatorContext
		{
		    $localContext = new Context\LogicalOperatorContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 108, self::RULE_logicalOperator);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(640);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::OR || $_la === self::AND)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function oalType(): Context\OalTypeContext
		{
		    $localContext = new Context\OalTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 110, self::RULE_oalType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(642);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 4610560118520545280) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function modelMethodCall(): Context\ModelMethodCallContext
		{
		    $localContext = new Context\ModelMethodCallContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 112, self::RULE_modelMethodCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(644);
		        $this->match(self::ID);
		        $this->setState(645);
		        $this->match(self::DOT);
		        $this->setState(646);
		        $this->match(self::MODEL_METHOD);
		        $this->setState(647);
		        $this->match(self::T__10);
		        $this->setState(649);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__32) {
		        	$this->setState(648);
		        	$this->modelMethodParams();
		        }
		        $this->setState(651);
		        $this->match(self::T__11);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function modelMethodParams(): Context\ModelMethodParamsContext
		{
		    $localContext = new Context\ModelMethodParamsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 114, self::RULE_modelMethodParams);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(653);
		        $this->arrayLiteral();
		        $this->setState(658);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(654);
		        	$this->match(self::COMMA);
		        	$this->setState(655);
		        	$this->arrayLiteral();
		        	$this->setState(660);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use OALParser;
	use OALVisitor;
	use OALListener;

	class ProgramContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_program;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::EOF, 0);
	    }

	    /**
	     * @return array<ImportStmtContext>|ImportStmtContext|null
	     */
	    public function importStmt(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ImportStmtContext::class);
	    	}

	        return $this->getTypedRuleContext(ImportStmtContext::class, $index);
	    }

	    /**
	     * @return array<RequireStmtContext>|RequireStmtContext|null
	     */
	    public function requireStmt(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(RequireStmtContext::class);
	    	}

	        return $this->getTypedRuleContext(RequireStmtContext::class, $index);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterProgram($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitProgram($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitProgram($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ImportStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_importStmt;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function idPath(): ?IdPathContext
	    {
	    	return $this->getTypedRuleContext(IdPathContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterImportStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitImportStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitImportStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class RequireStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_requireStmt;
	    }

	    public function REQUIRE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::REQUIRE, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::STRING, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterRequireStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitRequireStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitRequireStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IdPathContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_idPath;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::ID);
	    	}

	        return $this->getToken(OALParser::ID, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function DOT(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::DOT);
	    	}

	        return $this->getToken(OALParser::DOT, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterIdPath($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitIdPath($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitIdPath($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StatementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_statement;
	    }

	    public function varStmt(): ?VarStmtContext
	    {
	    	return $this->getTypedRuleContext(VarStmtContext::class, 0);
	    }

	    public function assignmentStmt(): ?AssignmentStmtContext
	    {
	    	return $this->getTypedRuleContext(AssignmentStmtContext::class, 0);
	    }

	    public function modelStmt(): ?ModelStmtContext
	    {
	    	return $this->getTypedRuleContext(ModelStmtContext::class, 0);
	    }

	    public function controllerStmt(): ?ControllerStmtContext
	    {
	    	return $this->getTypedRuleContext(ControllerStmtContext::class, 0);
	    }

	    public function routeStmt(): ?RouteStmtContext
	    {
	    	return $this->getTypedRuleContext(RouteStmtContext::class, 0);
	    }

	    public function middlewareStmt(): ?MiddlewareStmtContext
	    {
	    	return $this->getTypedRuleContext(MiddlewareStmtContext::class, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

	    public function foreachStmt(): ?ForeachStmtContext
	    {
	    	return $this->getTypedRuleContext(ForeachStmtContext::class, 0);
	    }

	    public function forStmt(): ?ForStmtContext
	    {
	    	return $this->getTypedRuleContext(ForStmtContext::class, 0);
	    }

	    public function whileStmt(): ?WhileStmtContext
	    {
	    	return $this->getTypedRuleContext(WhileStmtContext::class, 0);
	    }

	    public function breakStmt(): ?BreakStmtContext
	    {
	    	return $this->getTypedRuleContext(BreakStmtContext::class, 0);
	    }

	    public function continueStmt(): ?ContinueStmtContext
	    {
	    	return $this->getTypedRuleContext(ContinueStmtContext::class, 0);
	    }

	    public function tryCatchStmt(): ?TryCatchStmtContext
	    {
	    	return $this->getTypedRuleContext(TryCatchStmtContext::class, 0);
	    }

	    public function throwStmt(): ?ThrowStmtContext
	    {
	    	return $this->getTypedRuleContext(ThrowStmtContext::class, 0);
	    }

	    public function validateStmt(): ?ValidateStmtContext
	    {
	    	return $this->getTypedRuleContext(ValidateStmtContext::class, 0);
	    }

	    public function expressionStmt(): ?ExpressionStmtContext
	    {
	    	return $this->getTypedRuleContext(ExpressionStmtContext::class, 0);
	    }

	    public function returnStmt(): ?ReturnStmtContext
	    {
	    	return $this->getTypedRuleContext(ReturnStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterStatement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitStatement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitStatement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VarStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_varStmt;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::EQUAL, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterVarStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitVarStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitVarStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignmentStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_assignmentStmt;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::EQUAL, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterAssignmentStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitAssignmentStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitAssignmentStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ModelStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_modelStmt;
	    }

	    public function MODEL(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::MODEL, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    /**
	     * @return array<ModelBodyContext>|ModelBodyContext|null
	     */
	    public function modelBody(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ModelBodyContext::class);
	    	}

	        return $this->getTypedRuleContext(ModelBodyContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterModelStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitModelStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitModelStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ModelBodyContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_modelBody;
	    }

	    public function field(): ?FieldContext
	    {
	    	return $this->getTypedRuleContext(FieldContext::class, 0);
	    }

	    public function relation(): ?RelationContext
	    {
	    	return $this->getTypedRuleContext(RelationContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterModelBody($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitModelBody($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitModelBody($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FieldContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_field;
	    }

	    public function oalType(): ?OalTypeContext
	    {
	    	return $this->getTypedRuleContext(OalTypeContext::class, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

	    /**
	     * @return array<FieldModifierContext>|FieldModifierContext|null
	     */
	    public function fieldModifier(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(FieldModifierContext::class);
	    	}

	        return $this->getTypedRuleContext(FieldModifierContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterField($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitField($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitField($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FieldModifierContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_fieldModifier;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterFieldModifier($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitFieldModifier($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitFieldModifier($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class RelationContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_relation;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterRelation($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitRelation($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitRelation($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ControllerStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_controllerStmt;
	    }

	    public function CONTROLLER(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::CONTROLLER, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    /**
	     * @return array<ControllerBodyContext>|ControllerBodyContext|null
	     */
	    public function controllerBody(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ControllerBodyContext::class);
	    	}

	        return $this->getTypedRuleContext(ControllerBodyContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterControllerStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitControllerStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitControllerStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ControllerBodyContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_controllerBody;
	    }

	    public function controllerMethod(): ?ControllerMethodContext
	    {
	    	return $this->getTypedRuleContext(ControllerMethodContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterControllerBody($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitControllerBody($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitControllerBody($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ControllerMethodContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_controllerMethod;
	    }

	    public function FUNCTION(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::FUNCTION, 0);
	    }

	    public function CONTROLLER_METHOD_NAME(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::CONTROLLER_METHOD_NAME, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function parameterList(): ?ParameterListContext
	    {
	    	return $this->getTypedRuleContext(ParameterListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterControllerMethod($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitControllerMethod($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitControllerMethod($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParameterListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_parameterList;
	    }

	    /**
	     * @return array<ParameterContext>|ParameterContext|null
	     */
	    public function parameter(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ParameterContext::class);
	    	}

	        return $this->getTypedRuleContext(ParameterContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::COMMA);
	    	}

	        return $this->getToken(OALParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterParameterList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitParameterList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitParameterList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParameterContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_parameter;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::ID);
	    	}

	        return $this->getToken(OALParser::ID, $index);
	    }

	    public function oalType(): ?OalTypeContext
	    {
	    	return $this->getTypedRuleContext(OalTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterParameter($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitParameter($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitParameter($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BlockContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_block;
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MiddlewareStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_middlewareStmt;
	    }

	    public function MIDDLEWARE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::MIDDLEWARE, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    /**
	     * @return array<MiddlewareMethodContext>|MiddlewareMethodContext|null
	     */
	    public function middlewareMethod(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(MiddlewareMethodContext::class);
	    	}

	        return $this->getTypedRuleContext(MiddlewareMethodContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterMiddlewareStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitMiddlewareStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitMiddlewareStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MiddlewareMethodContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_middlewareMethod;
	    }

	    public function FUNCTION(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::FUNCTION, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function parameterList(): ?ParameterListContext
	    {
	    	return $this->getTypedRuleContext(ParameterListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterMiddlewareMethod($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitMiddlewareMethod($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitMiddlewareMethod($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_expressionStmt;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterExpressionStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitExpressionStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitExpressionStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_expression;
	    }

	    public function logicalOrExpr(): ?LogicalOrExprContext
	    {
	    	return $this->getTypedRuleContext(LogicalOrExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalOrExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_logicalOrExpr;
	    }

	    /**
	     * @return array<LogicalAndExprContext>|LogicalAndExprContext|null
	     */
	    public function logicalAndExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(LogicalAndExprContext::class);
	    	}

	        return $this->getTypedRuleContext(LogicalAndExprContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function OR(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::OR);
	    	}

	        return $this->getToken(OALParser::OR, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterLogicalOrExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitLogicalOrExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitLogicalOrExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalAndExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_logicalAndExpr;
	    }

	    /**
	     * @return array<EqualityExprContext>|EqualityExprContext|null
	     */
	    public function equalityExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(EqualityExprContext::class);
	    	}

	        return $this->getTypedRuleContext(EqualityExprContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function AND(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::AND);
	    	}

	        return $this->getToken(OALParser::AND, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterLogicalAndExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitLogicalAndExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitLogicalAndExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class EqualityExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_equalityExpr;
	    }

	    /**
	     * @return array<RelationalExprContext>|RelationalExprContext|null
	     */
	    public function relationalExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(RelationalExprContext::class);
	    	}

	        return $this->getTypedRuleContext(RelationalExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterEqualityExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitEqualityExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitEqualityExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class RelationalExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_relationalExpr;
	    }

	    /**
	     * @return array<AdditiveExprContext>|AdditiveExprContext|null
	     */
	    public function additiveExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(AdditiveExprContext::class);
	    	}

	        return $this->getTypedRuleContext(AdditiveExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterRelationalExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitRelationalExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitRelationalExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AdditiveExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_additiveExpr;
	    }

	    /**
	     * @return array<MultiplicativeExprContext>|MultiplicativeExprContext|null
	     */
	    public function multiplicativeExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(MultiplicativeExprContext::class);
	    	}

	        return $this->getTypedRuleContext(MultiplicativeExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterAdditiveExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitAdditiveExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitAdditiveExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MultiplicativeExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_multiplicativeExpr;
	    }

	    /**
	     * @return array<UnaryExprContext>|UnaryExprContext|null
	     */
	    public function unaryExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(UnaryExprContext::class);
	    	}

	        return $this->getTypedRuleContext(UnaryExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterMultiplicativeExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitMultiplicativeExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitMultiplicativeExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class UnaryExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_unaryExpr;
	    }

	    public function unaryExpr(): ?UnaryExprContext
	    {
	    	return $this->getTypedRuleContext(UnaryExprContext::class, 0);
	    }

	    public function atom(): ?AtomContext
	    {
	    	return $this->getTypedRuleContext(AtomContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterUnaryExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitUnaryExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitUnaryExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AtomContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_atom;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function sessionFunction(): ?SessionFunctionContext
	    {
	    	return $this->getTypedRuleContext(SessionFunctionContext::class, 0);
	    }

	    public function cookieFunction(): ?CookieFunctionContext
	    {
	    	return $this->getTypedRuleContext(CookieFunctionContext::class, 0);
	    }

	    public function modelMethodCall(): ?ModelMethodCallContext
	    {
	    	return $this->getTypedRuleContext(ModelMethodCallContext::class, 0);
	    }

	    public function functionCall(): ?FunctionCallContext
	    {
	    	return $this->getTypedRuleContext(FunctionCallContext::class, 0);
	    }

	    public function responseFunction(): ?ResponseFunctionContext
	    {
	    	return $this->getTypedRuleContext(ResponseFunctionContext::class, 0);
	    }

	    public function httpFetchFunction(): ?HttpFetchFunctionContext
	    {
	    	return $this->getTypedRuleContext(HttpFetchFunctionContext::class, 0);
	    }

	    public function idChain(): ?IdChainContext
	    {
	    	return $this->getTypedRuleContext(IdChainContext::class, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::STRING, 0);
	    }

	    public function NUMBER(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::NUMBER, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

	    public function newExpr(): ?NewExprContext
	    {
	    	return $this->getTypedRuleContext(NewExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterAtom($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitAtom($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitAtom($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class NewExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_newExpr;
	    }

	    public function NEW(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::NEW, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function argumentList(): ?ArgumentListContext
	    {
	    	return $this->getTypedRuleContext(ArgumentListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterNewExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitNewExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitNewExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_returnStmt;
	    }

	    public function RETURN(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::RETURN, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterReturnStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitReturnStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitReturnStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IdChainContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_idChain;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::ID);
	    	}

	        return $this->getToken(OALParser::ID, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function DOT(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::DOT);
	    	}

	        return $this->getToken(OALParser::DOT, $index);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<ArgumentListContext>|ArgumentListContext|null
	     */
	    public function argumentList(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArgumentListContext::class);
	    	}

	        return $this->getTypedRuleContext(ArgumentListContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterIdChain($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitIdChain($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitIdChain($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FunctionCallContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_functionCall;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function argumentList(): ?ArgumentListContext
	    {
	    	return $this->getTypedRuleContext(ArgumentListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterFunctionCall($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitFunctionCall($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitFunctionCall($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgumentListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_argumentList;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::COMMA);
	    	}

	        return $this->getToken(OALParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterArgumentList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitArgumentList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitArgumentList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_arrayLiteral;
	    }

	    /**
	     * @return array<ArrayElementContext>|ArrayElementContext|null
	     */
	    public function arrayElement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArrayElementContext::class);
	    	}

	        return $this->getTypedRuleContext(ArrayElementContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::COMMA);
	    	}

	        return $this->getToken(OALParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayElementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_arrayElement;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function ARROW_ASSOC(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ARROW_ASSOC, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterArrayElement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitArrayElement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitArrayElement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SessionFunctionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_sessionFunction;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::COMMA);
	    	}

	        return $this->getToken(OALParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterSessionFunction($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitSessionFunction($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitSessionFunction($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CookieFunctionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_cookieFunction;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::COMMA);
	    	}

	        return $this->getToken(OALParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterCookieFunction($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitCookieFunction($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitCookieFunction($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class HttpFetchFunctionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_httpFetchFunction;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::COMMA);
	    	}

	        return $this->getToken(OALParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterHttpFetchFunction($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitHttpFetchFunction($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitHttpFetchFunction($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ResponseFunctionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_responseFunction;
	    }

	    public function argumentList(): ?ArgumentListContext
	    {
	    	return $this->getTypedRuleContext(ArgumentListContext::class, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function COMMA(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::COMMA, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterResponseFunction($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitResponseFunction($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitResponseFunction($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class RouteStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_routeStmt;
	    }

	    public function ROUTE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ROUTE, 0);
	    }

	    public function HTTP_METHOD(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::HTTP_METHOD, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::STRING, 0);
	    }

	    public function ARROW(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ARROW, 0);
	    }

	    public function controllerRef(): ?ControllerRefContext
	    {
	    	return $this->getTypedRuleContext(ControllerRefContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

	    public function middlewareList(): ?MiddlewareListContext
	    {
	    	return $this->getTypedRuleContext(MiddlewareListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterRouteStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitRouteStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitRouteStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MiddlewareListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_middlewareList;
	    }

	    public function MIDDLEWARE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::MIDDLEWARE, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::ID);
	    	}

	        return $this->getToken(OALParser::ID, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::COMMA);
	    	}

	        return $this->getToken(OALParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterMiddlewareList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitMiddlewareList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitMiddlewareList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ControllerRefContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_controllerRef;
	    }

	    public function CONTROLLER_METHOD(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::CONTROLLER_METHOD, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterControllerRef($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitControllerRef($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitControllerRef($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForeachStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_foreachStmt;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function IN(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::IN, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterForeachStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitForeachStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitForeachStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_forStmt;
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::FOR, 0);
	    }

	    public function varStmt(): ?VarStmtContext
	    {
	    	return $this->getTypedRuleContext(VarStmtContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

	    public function assignmentStmt(): ?AssignmentStmtContext
	    {
	    	return $this->getTypedRuleContext(AssignmentStmtContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterForStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitForStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitForStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class WhileStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_whileStmt;
	    }

	    public function WHILE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::WHILE, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterWhileStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitWhileStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitWhileStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BreakStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_breakStmt;
	    }

	    public function BREAK(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::BREAK, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterBreakStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitBreakStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitBreakStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ContinueStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_continueStmt;
	    }

	    public function CONTINUE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::CONTINUE, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterContinueStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitContinueStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitContinueStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TryCatchStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_tryCatchStmt;
	    }

	    public function TRY(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::TRY, 0);
	    }

	    /**
	     * @return array<BlockContext>|BlockContext|null
	     */
	    public function block(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BlockContext::class);
	    	}

	        return $this->getTypedRuleContext(BlockContext::class, $index);
	    }

	    public function CATCH(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::CATCH, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::ID);
	    	}

	        return $this->getToken(OALParser::ID, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterTryCatchStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitTryCatchStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitTryCatchStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ThrowStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_throwStmt;
	    }

	    public function THROW(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::THROW, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterThrowStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitThrowStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitThrowStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ValidateStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_validateStmt;
	    }

	    public function VALIDATE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::VALIDATE, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterValidateStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitValidateStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitValidateStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IfStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_ifStmt;
	    }

	    public function IF(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::IF, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<BlockContext>|BlockContext|null
	     */
	    public function block(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BlockContext::class);
	    	}

	        return $this->getTypedRuleContext(BlockContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ELSEIF(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::ELSEIF);
	    	}

	        return $this->getToken(OALParser::ELSEIF, $index);
	    }

	    public function ELSE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ELSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterIfStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitIfStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitIfStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ComparisonOperatorContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_comparisonOperator;
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterComparisonOperator($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitComparisonOperator($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitComparisonOperator($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalOperatorContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_logicalOperator;
	    }

	    public function AND(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::AND, 0);
	    }

	    public function OR(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::OR, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterLogicalOperator($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitLogicalOperator($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitLogicalOperator($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class OalTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_oalType;
	    }

	    public function STRING_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::STRING_TYPE, 0);
	    }

	    public function TEXT_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::TEXT_TYPE, 0);
	    }

	    public function INTEGER_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::INTEGER_TYPE, 0);
	    }

	    public function BIGINTEGER_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::BIGINTEGER_TYPE, 0);
	    }

	    public function FLOAT_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::FLOAT_TYPE, 0);
	    }

	    public function DOUBLE_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::DOUBLE_TYPE, 0);
	    }

	    public function DECIMAL_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::DECIMAL_TYPE, 0);
	    }

	    public function BOOLEAN_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::BOOLEAN_TYPE, 0);
	    }

	    public function DATE_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::DATE_TYPE, 0);
	    }

	    public function DATETIME_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::DATETIME_TYPE, 0);
	    }

	    public function TIME_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::TIME_TYPE, 0);
	    }

	    public function TIMESTAMP_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::TIMESTAMP_TYPE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterOalType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitOalType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitOalType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ModelMethodCallContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_modelMethodCall;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::ID, 0);
	    }

	    public function DOT(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::DOT, 0);
	    }

	    public function MODEL_METHOD(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::MODEL_METHOD, 0);
	    }

	    public function modelMethodParams(): ?ModelMethodParamsContext
	    {
	    	return $this->getTypedRuleContext(ModelMethodParamsContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterModelMethodCall($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitModelMethodCall($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitModelMethodCall($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ModelMethodParamsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OALParser::RULE_modelMethodParams;
	    }

	    /**
	     * @return array<ArrayLiteralContext>|ArrayLiteralContext|null
	     */
	    public function arrayLiteral(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArrayLiteralContext::class);
	    	}

	        return $this->getTypedRuleContext(ArrayLiteralContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OALParser::COMMA);
	    	}

	        return $this->getToken(OALParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->enterModelMethodParams($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OALListener) {
			    $listener->exitModelMethodParams($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OALVisitor) {
			    return $visitor->visitModelMethodParams($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}