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
               T__47 = 48, T__48 = 49, HTTP_METHOD = 50, HTTP_GET = 51, 
               HTTP_POST = 52, HTTP_PUT = 53, HTTP_DELETE = 54, HTTP_PATCH = 55, 
               CONTROLLER_METHOD = 56, CONTROLLER_METHOD_NAME = 57, MODEL_METHOD = 58, 
               STRING_TYPE = 59, TEXT_TYPE = 60, INTEGER_TYPE = 61, BIGINT_TYPE = 62, 
               UNSIGNED_BIGINT_TYPE = 63, FLOAT_TYPE = 64, DOUBLE_TYPE = 65, 
               DECIMAL_TYPE = 66, BOOLEAN_TYPE = 67, DATE_TYPE = 68, DATETIME_TYPE = 69, 
               TIME_TYPE = 70, TIMESTAMP_TYPE = 71, ROUTE = 72, MODEL = 73, 
               CONTROLLER = 74, MIDDLEWARE = 75, FUNCTION = 76, RETURN = 77, 
               IF = 78, ELSEIF = 79, ELSE = 80, FOR = 81, IN = 82, COMMA = 83, 
               SEMICOLON = 84, ARROW = 85, ARROW_ASSOC = 86, DOT = 87, EQUAL = 88, 
               ID = 89, NUMBER = 90, STRING = 91, LINE_COMMENT = 92, BLOCK_COMMENT = 93, 
               WS = 94;

		public const RULE_program = 0, RULE_statement = 1, RULE_varStmt = 2, RULE_assignmentStmt = 3, 
               RULE_modelStmt = 4, RULE_modelBody = 5, RULE_field = 6, RULE_fieldModifier = 7, 
               RULE_relation = 8, RULE_controllerStmt = 9, RULE_controllerBody = 10, 
               RULE_controllerMethod = 11, RULE_parameterList = 12, RULE_parameter = 13, 
               RULE_block = 14, RULE_middlewareStmt = 15, RULE_middlewareMethod = 16, 
               RULE_expressionStmt = 17, RULE_expression = 18, RULE_logicalOrExpr = 19, 
               RULE_logicalAndExpr = 20, RULE_equalityExpr = 21, RULE_relationalExpr = 22, 
               RULE_additiveExpr = 23, RULE_multiplicativeExpr = 24, RULE_unaryExpr = 25, 
               RULE_atom = 26, RULE_returnStmt = 27, RULE_idChain = 28, 
               RULE_functionCall = 29, RULE_argumentList = 30, RULE_arrayLiteral = 31, 
               RULE_arrayElement = 32, RULE_sessionFunction = 33, RULE_cookieFunction = 34, 
               RULE_httpFetchFunction = 35, RULE_responseFunction = 36, 
               RULE_routeStmt = 37, RULE_middlewareList = 38, RULE_controllerRef = 39, 
               RULE_foreachStmt = 40, RULE_forStmt = 41, RULE_ifStmt = 42, 
               RULE_comparisonOperator = 43, RULE_logicalOperator = 44, 
               RULE_oalType = 45, RULE_modelMethodCall = 46, RULE_modelMethodParams = 47;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'statement', 'varStmt', 'assignmentStmt', 'modelStmt', 'modelBody', 
			'field', 'fieldModifier', 'relation', 'controllerStmt', 'controllerBody', 
			'controllerMethod', 'parameterList', 'parameter', 'block', 'middlewareStmt', 
			'middlewareMethod', 'expressionStmt', 'expression', 'logicalOrExpr', 
			'logicalAndExpr', 'equalityExpr', 'relationalExpr', 'additiveExpr', 'multiplicativeExpr', 
			'unaryExpr', 'atom', 'returnStmt', 'idChain', 'functionCall', 'argumentList', 
			'arrayLiteral', 'arrayElement', 'sessionFunction', 'cookieFunction', 
			'httpFetchFunction', 'responseFunction', 'routeStmt', 'middlewareList', 
			'controllerRef', 'foreachStmt', 'forStmt', 'ifStmt', 'comparisonOperator', 
			'logicalOperator', 'oalType', 'modelMethodCall', 'modelMethodParams'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'var'", "'{'", "'}'", "'primary'", "'unique'", "'nullable'", 
		    "'default'", "'('", "')'", "'hasMany'", "'belongsTo'", "'hasOne'", 
		    "'belongsToMany'", "'handleAction'", "'||'", "'&&'", "'=='", "'!='", 
		    "'<'", "'<='", "'>'", "'>='", "'+'", "'-'", "'*'", "'/'", "'%'", "'!'", 
		    "'true'", "'false'", "'null'", "'['", "']'", "'setSession'", "'getSession'", 
		    "'setCookie'", "'getCookie'", "'removeCookie'", "'fetchGet'", "'fetchPost'", 
		    "'fetchPut'", "'fetchPatch'", "'fetchDelete'", "'json'", "'html'", 
		    "'redirect'", "'print'", "'split'", "'foreach'", null, "'get'", "'post'", 
		    "'put'", "'delete'", "'patch'", null, null, null, "'string'", "'text'", 
		    "'integer'", "'bigInteger'", "'unsignedBigInteger'", "'float'", "'double'", 
		    "'decimal'", "'boolean'", "'date'", "'datetime'", "'time'", "'timestamp'", 
		    "'route'", "'model'", "'controller'", "'middleware'", "'function'", 
		    "'return'", "'if'", "'elseif'", "'else'", "'for'", "'in'", "','", 
		    "';'", "'->'", "'=>'", "'.'", "'='"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, "HTTP_METHOD", "HTTP_GET", "HTTP_POST", 
		    "HTTP_PUT", "HTTP_DELETE", "HTTP_PATCH", "CONTROLLER_METHOD", "CONTROLLER_METHOD_NAME", 
		    "MODEL_METHOD", "STRING_TYPE", "TEXT_TYPE", "INTEGER_TYPE", "BIGINT_TYPE", 
		    "UNSIGNED_BIGINT_TYPE", "FLOAT_TYPE", "DOUBLE_TYPE", "DECIMAL_TYPE", 
		    "BOOLEAN_TYPE", "DATE_TYPE", "DATETIME_TYPE", "TIME_TYPE", "TIMESTAMP_TYPE", 
		    "ROUTE", "MODEL", "CONTROLLER", "MIDDLEWARE", "FUNCTION", "RETURN", 
		    "IF", "ELSEIF", "ELSE", "FOR", "IN", "COMMA", "SEMICOLON", "ARROW", 
		    "ARROW_ASSOC", "DOT", "EQUAL", "ID", "NUMBER", "STRING", "LINE_COMMENT", 
		    "BLOCK_COMMENT", "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 94, 579, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 2, 44, 7, 44, 2, 45, 7, 45, 2, 46, 7, 46, 2, 47, 7, 47, 
		    1, 0, 5, 0, 98, 8, 0, 10, 0, 12, 0, 101, 9, 0, 1, 0, 1, 0, 1, 1, 1, 
		    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 116, 
		    8, 1, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 1, 3, 
		    1, 3, 1, 4, 1, 4, 1, 4, 1, 4, 5, 4, 133, 8, 4, 10, 4, 12, 4, 136, 
		    9, 4, 1, 4, 1, 4, 1, 5, 1, 5, 3, 5, 142, 8, 5, 1, 6, 1, 6, 1, 6, 5, 
		    6, 147, 8, 6, 10, 6, 12, 6, 150, 9, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 
		    7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 3, 7, 162, 8, 7, 1, 8, 1, 8, 1, 8, 
		    1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 176, 8, 
		    8, 1, 9, 1, 9, 1, 9, 1, 9, 4, 9, 182, 8, 9, 11, 9, 12, 9, 183, 1, 
		    9, 1, 9, 1, 10, 1, 10, 1, 11, 1, 11, 1, 11, 1, 11, 3, 11, 194, 8, 
		    11, 1, 11, 1, 11, 1, 11, 1, 12, 1, 12, 1, 12, 5, 12, 202, 8, 12, 10, 
		    12, 12, 12, 205, 9, 12, 1, 13, 1, 13, 1, 13, 1, 14, 1, 14, 5, 14, 
		    212, 8, 14, 10, 14, 12, 14, 215, 9, 14, 1, 14, 1, 14, 1, 15, 1, 15, 
		    1, 15, 1, 15, 4, 15, 223, 8, 15, 11, 15, 12, 15, 224, 1, 15, 1, 15, 
		    1, 16, 1, 16, 1, 16, 1, 16, 3, 16, 233, 8, 16, 1, 16, 1, 16, 1, 16, 
		    1, 17, 1, 17, 1, 17, 1, 18, 1, 18, 1, 19, 1, 19, 1, 19, 5, 19, 246, 
		    8, 19, 10, 19, 12, 19, 249, 9, 19, 1, 20, 1, 20, 1, 20, 5, 20, 254, 
		    8, 20, 10, 20, 12, 20, 257, 9, 20, 1, 21, 1, 21, 1, 21, 5, 21, 262, 
		    8, 21, 10, 21, 12, 21, 265, 9, 21, 1, 22, 1, 22, 1, 22, 5, 22, 270, 
		    8, 22, 10, 22, 12, 22, 273, 9, 22, 1, 23, 1, 23, 1, 23, 5, 23, 278, 
		    8, 23, 10, 23, 12, 23, 281, 9, 23, 1, 24, 1, 24, 1, 24, 5, 24, 286, 
		    8, 24, 10, 24, 12, 24, 289, 9, 24, 1, 25, 1, 25, 1, 25, 3, 25, 294, 
		    8, 25, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 
		    26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 1, 26, 3, 26, 
		    313, 8, 26, 1, 27, 1, 27, 3, 27, 317, 8, 27, 1, 27, 1, 27, 1, 28, 
		    1, 28, 1, 28, 1, 28, 1, 28, 3, 28, 326, 8, 28, 1, 28, 3, 28, 329, 
		    8, 28, 5, 28, 331, 8, 28, 10, 28, 12, 28, 334, 9, 28, 1, 29, 1, 29, 
		    1, 29, 3, 29, 339, 8, 29, 1, 29, 1, 29, 1, 30, 1, 30, 1, 30, 5, 30, 
		    346, 8, 30, 10, 30, 12, 30, 349, 9, 30, 1, 31, 1, 31, 1, 31, 1, 31, 
		    5, 31, 355, 8, 31, 10, 31, 12, 31, 358, 9, 31, 1, 31, 3, 31, 361, 
		    8, 31, 1, 31, 1, 31, 1, 32, 1, 32, 1, 32, 3, 32, 368, 8, 32, 1, 33, 
		    1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 3, 33, 377, 8, 33, 1, 33, 
		    1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 3, 33, 386, 8, 33, 1, 34, 
		    1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 3, 34, 395, 8, 34, 1, 34, 
		    1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 
		    34, 1, 34, 3, 34, 409, 8, 34, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 
		    35, 1, 35, 3, 35, 418, 8, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 
		    35, 1, 35, 1, 35, 1, 35, 3, 35, 429, 8, 35, 1, 35, 1, 35, 1, 35, 1, 
		    35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 3, 35, 440, 8, 35, 1, 35, 1, 
		    35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 3, 35, 451, 8, 
		    35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 
		    3, 35, 462, 8, 35, 1, 35, 1, 35, 3, 35, 466, 8, 35, 1, 36, 1, 36, 
		    1, 36, 3, 36, 471, 8, 36, 1, 36, 1, 36, 1, 36, 1, 36, 3, 36, 477, 
		    8, 36, 1, 36, 1, 36, 1, 36, 1, 36, 3, 36, 483, 8, 36, 1, 36, 1, 36, 
		    1, 36, 1, 36, 3, 36, 489, 8, 36, 1, 36, 1, 36, 1, 36, 1, 36, 1, 36, 
		    1, 36, 1, 36, 1, 36, 3, 36, 499, 8, 36, 1, 37, 1, 37, 1, 37, 1, 37, 
		    1, 37, 1, 37, 3, 37, 507, 8, 37, 1, 37, 1, 37, 1, 38, 1, 38, 1, 38, 
		    1, 38, 5, 38, 515, 8, 38, 10, 38, 12, 38, 518, 9, 38, 1, 39, 1, 39, 
		    1, 40, 1, 40, 1, 40, 1, 40, 1, 40, 1, 40, 1, 40, 1, 40, 1, 41, 1, 
		    41, 1, 41, 1, 41, 1, 41, 1, 41, 1, 41, 1, 41, 1, 41, 1, 42, 1, 42, 
		    1, 42, 1, 42, 1, 42, 1, 42, 1, 42, 1, 42, 1, 42, 1, 42, 1, 42, 5, 
		    42, 550, 8, 42, 10, 42, 12, 42, 553, 9, 42, 1, 42, 1, 42, 3, 42, 557, 
		    8, 42, 1, 43, 1, 43, 1, 44, 1, 44, 1, 45, 1, 45, 1, 46, 1, 46, 1, 
		    46, 1, 46, 1, 46, 3, 46, 570, 8, 46, 1, 46, 1, 46, 1, 47, 1, 47, 1, 
		    47, 3, 47, 577, 8, 47, 1, 47, 0, 0, 48, 0, 2, 4, 6, 8, 10, 12, 14, 
		    16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 
		    50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82, 
		    84, 86, 88, 90, 92, 94, 0, 7, 1, 0, 17, 18, 1, 0, 19, 22, 1, 0, 23, 
		    24, 1, 0, 25, 27, 1, 0, 17, 22, 1, 0, 15, 16, 1, 0, 59, 71, 613, 0, 
		    99, 1, 0, 0, 0, 2, 115, 1, 0, 0, 0, 4, 117, 1, 0, 0, 0, 6, 123, 1, 
		    0, 0, 0, 8, 128, 1, 0, 0, 0, 10, 141, 1, 0, 0, 0, 12, 143, 1, 0, 0, 
		    0, 14, 161, 1, 0, 0, 0, 16, 175, 1, 0, 0, 0, 18, 177, 1, 0, 0, 0, 
		    20, 187, 1, 0, 0, 0, 22, 189, 1, 0, 0, 0, 24, 198, 1, 0, 0, 0, 26, 
		    206, 1, 0, 0, 0, 28, 209, 1, 0, 0, 0, 30, 218, 1, 0, 0, 0, 32, 228, 
		    1, 0, 0, 0, 34, 237, 1, 0, 0, 0, 36, 240, 1, 0, 0, 0, 38, 242, 1, 
		    0, 0, 0, 40, 250, 1, 0, 0, 0, 42, 258, 1, 0, 0, 0, 44, 266, 1, 0, 
		    0, 0, 46, 274, 1, 0, 0, 0, 48, 282, 1, 0, 0, 0, 50, 293, 1, 0, 0, 
		    0, 52, 312, 1, 0, 0, 0, 54, 314, 1, 0, 0, 0, 56, 320, 1, 0, 0, 0, 
		    58, 335, 1, 0, 0, 0, 60, 342, 1, 0, 0, 0, 62, 350, 1, 0, 0, 0, 64, 
		    364, 1, 0, 0, 0, 66, 385, 1, 0, 0, 0, 68, 408, 1, 0, 0, 0, 70, 465, 
		    1, 0, 0, 0, 72, 498, 1, 0, 0, 0, 74, 500, 1, 0, 0, 0, 76, 510, 1, 
		    0, 0, 0, 78, 519, 1, 0, 0, 0, 80, 521, 1, 0, 0, 0, 82, 529, 1, 0, 
		    0, 0, 84, 538, 1, 0, 0, 0, 86, 558, 1, 0, 0, 0, 88, 560, 1, 0, 0, 
		    0, 90, 562, 1, 0, 0, 0, 92, 564, 1, 0, 0, 0, 94, 573, 1, 0, 0, 0, 
		    96, 98, 3, 2, 1, 0, 97, 96, 1, 0, 0, 0, 98, 101, 1, 0, 0, 0, 99, 97, 
		    1, 0, 0, 0, 99, 100, 1, 0, 0, 0, 100, 102, 1, 0, 0, 0, 101, 99, 1, 
		    0, 0, 0, 102, 103, 5, 0, 0, 1, 103, 1, 1, 0, 0, 0, 104, 116, 3, 4, 
		    2, 0, 105, 116, 3, 6, 3, 0, 106, 116, 3, 8, 4, 0, 107, 116, 3, 18, 
		    9, 0, 108, 116, 3, 74, 37, 0, 109, 116, 3, 30, 15, 0, 110, 116, 3, 
		    84, 42, 0, 111, 116, 3, 80, 40, 0, 112, 116, 3, 82, 41, 0, 113, 116, 
		    3, 34, 17, 0, 114, 116, 3, 54, 27, 0, 115, 104, 1, 0, 0, 0, 115, 105, 
		    1, 0, 0, 0, 115, 106, 1, 0, 0, 0, 115, 107, 1, 0, 0, 0, 115, 108, 
		    1, 0, 0, 0, 115, 109, 1, 0, 0, 0, 115, 110, 1, 0, 0, 0, 115, 111, 
		    1, 0, 0, 0, 115, 112, 1, 0, 0, 0, 115, 113, 1, 0, 0, 0, 115, 114, 
		    1, 0, 0, 0, 116, 3, 1, 0, 0, 0, 117, 118, 5, 1, 0, 0, 118, 119, 5, 
		    89, 0, 0, 119, 120, 5, 88, 0, 0, 120, 121, 3, 36, 18, 0, 121, 122, 
		    5, 84, 0, 0, 122, 5, 1, 0, 0, 0, 123, 124, 5, 89, 0, 0, 124, 125, 
		    5, 88, 0, 0, 125, 126, 3, 36, 18, 0, 126, 127, 5, 84, 0, 0, 127, 7, 
		    1, 0, 0, 0, 128, 129, 5, 73, 0, 0, 129, 130, 5, 89, 0, 0, 130, 134, 
		    5, 2, 0, 0, 131, 133, 3, 10, 5, 0, 132, 131, 1, 0, 0, 0, 133, 136, 
		    1, 0, 0, 0, 134, 132, 1, 0, 0, 0, 134, 135, 1, 0, 0, 0, 135, 137, 
		    1, 0, 0, 0, 136, 134, 1, 0, 0, 0, 137, 138, 5, 3, 0, 0, 138, 9, 1, 
		    0, 0, 0, 139, 142, 3, 12, 6, 0, 140, 142, 3, 16, 8, 0, 141, 139, 1, 
		    0, 0, 0, 141, 140, 1, 0, 0, 0, 142, 11, 1, 0, 0, 0, 143, 144, 3, 90, 
		    45, 0, 144, 148, 5, 89, 0, 0, 145, 147, 3, 14, 7, 0, 146, 145, 1, 
		    0, 0, 0, 147, 150, 1, 0, 0, 0, 148, 146, 1, 0, 0, 0, 148, 149, 1, 
		    0, 0, 0, 149, 151, 1, 0, 0, 0, 150, 148, 1, 0, 0, 0, 151, 152, 5, 
		    84, 0, 0, 152, 13, 1, 0, 0, 0, 153, 162, 5, 4, 0, 0, 154, 162, 5, 
		    5, 0, 0, 155, 162, 5, 6, 0, 0, 156, 157, 5, 7, 0, 0, 157, 158, 5, 
		    8, 0, 0, 158, 159, 3, 36, 18, 0, 159, 160, 5, 9, 0, 0, 160, 162, 1, 
		    0, 0, 0, 161, 153, 1, 0, 0, 0, 161, 154, 1, 0, 0, 0, 161, 155, 1, 
		    0, 0, 0, 161, 156, 1, 0, 0, 0, 162, 15, 1, 0, 0, 0, 163, 164, 5, 10, 
		    0, 0, 164, 165, 5, 89, 0, 0, 165, 176, 5, 84, 0, 0, 166, 167, 5, 11, 
		    0, 0, 167, 168, 5, 89, 0, 0, 168, 176, 5, 84, 0, 0, 169, 170, 5, 12, 
		    0, 0, 170, 171, 5, 89, 0, 0, 171, 176, 5, 84, 0, 0, 172, 173, 5, 13, 
		    0, 0, 173, 174, 5, 89, 0, 0, 174, 176, 5, 84, 0, 0, 175, 163, 1, 0, 
		    0, 0, 175, 166, 1, 0, 0, 0, 175, 169, 1, 0, 0, 0, 175, 172, 1, 0, 
		    0, 0, 176, 17, 1, 0, 0, 0, 177, 178, 5, 74, 0, 0, 178, 179, 5, 89, 
		    0, 0, 179, 181, 5, 2, 0, 0, 180, 182, 3, 20, 10, 0, 181, 180, 1, 0, 
		    0, 0, 182, 183, 1, 0, 0, 0, 183, 181, 1, 0, 0, 0, 183, 184, 1, 0, 
		    0, 0, 184, 185, 1, 0, 0, 0, 185, 186, 5, 3, 0, 0, 186, 19, 1, 0, 0, 
		    0, 187, 188, 3, 22, 11, 0, 188, 21, 1, 0, 0, 0, 189, 190, 5, 76, 0, 
		    0, 190, 191, 5, 57, 0, 0, 191, 193, 5, 8, 0, 0, 192, 194, 3, 24, 12, 
		    0, 193, 192, 1, 0, 0, 0, 193, 194, 1, 0, 0, 0, 194, 195, 1, 0, 0, 
		    0, 195, 196, 5, 9, 0, 0, 196, 197, 3, 28, 14, 0, 197, 23, 1, 0, 0, 
		    0, 198, 203, 3, 26, 13, 0, 199, 200, 5, 83, 0, 0, 200, 202, 3, 26, 
		    13, 0, 201, 199, 1, 0, 0, 0, 202, 205, 1, 0, 0, 0, 203, 201, 1, 0, 
		    0, 0, 203, 204, 1, 0, 0, 0, 204, 25, 1, 0, 0, 0, 205, 203, 1, 0, 0, 
		    0, 206, 207, 5, 89, 0, 0, 207, 208, 5, 89, 0, 0, 208, 27, 1, 0, 0, 
		    0, 209, 213, 5, 2, 0, 0, 210, 212, 3, 2, 1, 0, 211, 210, 1, 0, 0, 
		    0, 212, 215, 1, 0, 0, 0, 213, 211, 1, 0, 0, 0, 213, 214, 1, 0, 0, 
		    0, 214, 216, 1, 0, 0, 0, 215, 213, 1, 0, 0, 0, 216, 217, 5, 3, 0, 
		    0, 217, 29, 1, 0, 0, 0, 218, 219, 5, 75, 0, 0, 219, 220, 5, 89, 0, 
		    0, 220, 222, 5, 2, 0, 0, 221, 223, 3, 32, 16, 0, 222, 221, 1, 0, 0, 
		    0, 223, 224, 1, 0, 0, 0, 224, 222, 1, 0, 0, 0, 224, 225, 1, 0, 0, 
		    0, 225, 226, 1, 0, 0, 0, 226, 227, 5, 3, 0, 0, 227, 31, 1, 0, 0, 0, 
		    228, 229, 5, 76, 0, 0, 229, 230, 5, 14, 0, 0, 230, 232, 5, 8, 0, 0, 
		    231, 233, 3, 24, 12, 0, 232, 231, 1, 0, 0, 0, 232, 233, 1, 0, 0, 0, 
		    233, 234, 1, 0, 0, 0, 234, 235, 5, 9, 0, 0, 235, 236, 3, 28, 14, 0, 
		    236, 33, 1, 0, 0, 0, 237, 238, 3, 36, 18, 0, 238, 239, 5, 84, 0, 0, 
		    239, 35, 1, 0, 0, 0, 240, 241, 3, 38, 19, 0, 241, 37, 1, 0, 0, 0, 
		    242, 247, 3, 40, 20, 0, 243, 244, 5, 15, 0, 0, 244, 246, 3, 40, 20, 
		    0, 245, 243, 1, 0, 0, 0, 246, 249, 1, 0, 0, 0, 247, 245, 1, 0, 0, 
		    0, 247, 248, 1, 0, 0, 0, 248, 39, 1, 0, 0, 0, 249, 247, 1, 0, 0, 0, 
		    250, 255, 3, 42, 21, 0, 251, 252, 5, 16, 0, 0, 252, 254, 3, 42, 21, 
		    0, 253, 251, 1, 0, 0, 0, 254, 257, 1, 0, 0, 0, 255, 253, 1, 0, 0, 
		    0, 255, 256, 1, 0, 0, 0, 256, 41, 1, 0, 0, 0, 257, 255, 1, 0, 0, 0, 
		    258, 263, 3, 44, 22, 0, 259, 260, 7, 0, 0, 0, 260, 262, 3, 44, 22, 
		    0, 261, 259, 1, 0, 0, 0, 262, 265, 1, 0, 0, 0, 263, 261, 1, 0, 0, 
		    0, 263, 264, 1, 0, 0, 0, 264, 43, 1, 0, 0, 0, 265, 263, 1, 0, 0, 0, 
		    266, 271, 3, 46, 23, 0, 267, 268, 7, 1, 0, 0, 268, 270, 3, 46, 23, 
		    0, 269, 267, 1, 0, 0, 0, 270, 273, 1, 0, 0, 0, 271, 269, 1, 0, 0, 
		    0, 271, 272, 1, 0, 0, 0, 272, 45, 1, 0, 0, 0, 273, 271, 1, 0, 0, 0, 
		    274, 279, 3, 48, 24, 0, 275, 276, 7, 2, 0, 0, 276, 278, 3, 48, 24, 
		    0, 277, 275, 1, 0, 0, 0, 278, 281, 1, 0, 0, 0, 279, 277, 1, 0, 0, 
		    0, 279, 280, 1, 0, 0, 0, 280, 47, 1, 0, 0, 0, 281, 279, 1, 0, 0, 0, 
		    282, 287, 3, 50, 25, 0, 283, 284, 7, 3, 0, 0, 284, 286, 3, 50, 25, 
		    0, 285, 283, 1, 0, 0, 0, 286, 289, 1, 0, 0, 0, 287, 285, 1, 0, 0, 
		    0, 287, 288, 1, 0, 0, 0, 288, 49, 1, 0, 0, 0, 289, 287, 1, 0, 0, 0, 
		    290, 291, 5, 28, 0, 0, 291, 294, 3, 50, 25, 0, 292, 294, 3, 52, 26, 
		    0, 293, 290, 1, 0, 0, 0, 293, 292, 1, 0, 0, 0, 294, 51, 1, 0, 0, 0, 
		    295, 296, 5, 8, 0, 0, 296, 297, 3, 36, 18, 0, 297, 298, 5, 9, 0, 0, 
		    298, 313, 1, 0, 0, 0, 299, 313, 3, 66, 33, 0, 300, 313, 3, 68, 34, 
		    0, 301, 313, 3, 92, 46, 0, 302, 313, 3, 58, 29, 0, 303, 313, 3, 72, 
		    36, 0, 304, 313, 3, 70, 35, 0, 305, 313, 3, 56, 28, 0, 306, 313, 5, 
		    91, 0, 0, 307, 313, 5, 90, 0, 0, 308, 313, 5, 29, 0, 0, 309, 313, 
		    5, 30, 0, 0, 310, 313, 5, 31, 0, 0, 311, 313, 3, 62, 31, 0, 312, 295, 
		    1, 0, 0, 0, 312, 299, 1, 0, 0, 0, 312, 300, 1, 0, 0, 0, 312, 301, 
		    1, 0, 0, 0, 312, 302, 1, 0, 0, 0, 312, 303, 1, 0, 0, 0, 312, 304, 
		    1, 0, 0, 0, 312, 305, 1, 0, 0, 0, 312, 306, 1, 0, 0, 0, 312, 307, 
		    1, 0, 0, 0, 312, 308, 1, 0, 0, 0, 312, 309, 1, 0, 0, 0, 312, 310, 
		    1, 0, 0, 0, 312, 311, 1, 0, 0, 0, 313, 53, 1, 0, 0, 0, 314, 316, 5, 
		    77, 0, 0, 315, 317, 3, 36, 18, 0, 316, 315, 1, 0, 0, 0, 316, 317, 
		    1, 0, 0, 0, 317, 318, 1, 0, 0, 0, 318, 319, 5, 84, 0, 0, 319, 55, 
		    1, 0, 0, 0, 320, 332, 5, 89, 0, 0, 321, 322, 5, 87, 0, 0, 322, 328, 
		    5, 89, 0, 0, 323, 325, 5, 8, 0, 0, 324, 326, 3, 60, 30, 0, 325, 324, 
		    1, 0, 0, 0, 325, 326, 1, 0, 0, 0, 326, 327, 1, 0, 0, 0, 327, 329, 
		    5, 9, 0, 0, 328, 323, 1, 0, 0, 0, 328, 329, 1, 0, 0, 0, 329, 331, 
		    1, 0, 0, 0, 330, 321, 1, 0, 0, 0, 331, 334, 1, 0, 0, 0, 332, 330, 
		    1, 0, 0, 0, 332, 333, 1, 0, 0, 0, 333, 57, 1, 0, 0, 0, 334, 332, 1, 
		    0, 0, 0, 335, 336, 5, 89, 0, 0, 336, 338, 5, 8, 0, 0, 337, 339, 3, 
		    60, 30, 0, 338, 337, 1, 0, 0, 0, 338, 339, 1, 0, 0, 0, 339, 340, 1, 
		    0, 0, 0, 340, 341, 5, 9, 0, 0, 341, 59, 1, 0, 0, 0, 342, 347, 3, 36, 
		    18, 0, 343, 344, 5, 83, 0, 0, 344, 346, 3, 36, 18, 0, 345, 343, 1, 
		    0, 0, 0, 346, 349, 1, 0, 0, 0, 347, 345, 1, 0, 0, 0, 347, 348, 1, 
		    0, 0, 0, 348, 61, 1, 0, 0, 0, 349, 347, 1, 0, 0, 0, 350, 351, 5, 32, 
		    0, 0, 351, 356, 3, 64, 32, 0, 352, 353, 5, 83, 0, 0, 353, 355, 3, 
		    64, 32, 0, 354, 352, 1, 0, 0, 0, 355, 358, 1, 0, 0, 0, 356, 354, 1, 
		    0, 0, 0, 356, 357, 1, 0, 0, 0, 357, 360, 1, 0, 0, 0, 358, 356, 1, 
		    0, 0, 0, 359, 361, 5, 83, 0, 0, 360, 359, 1, 0, 0, 0, 360, 361, 1, 
		    0, 0, 0, 361, 362, 1, 0, 0, 0, 362, 363, 5, 33, 0, 0, 363, 63, 1, 
		    0, 0, 0, 364, 367, 3, 36, 18, 0, 365, 366, 5, 86, 0, 0, 366, 368, 
		    3, 36, 18, 0, 367, 365, 1, 0, 0, 0, 367, 368, 1, 0, 0, 0, 368, 65, 
		    1, 0, 0, 0, 369, 370, 5, 34, 0, 0, 370, 371, 5, 8, 0, 0, 371, 372, 
		    3, 36, 18, 0, 372, 373, 5, 83, 0, 0, 373, 376, 3, 36, 18, 0, 374, 
		    375, 5, 83, 0, 0, 375, 377, 3, 36, 18, 0, 376, 374, 1, 0, 0, 0, 376, 
		    377, 1, 0, 0, 0, 377, 378, 1, 0, 0, 0, 378, 379, 5, 9, 0, 0, 379, 
		    386, 1, 0, 0, 0, 380, 381, 5, 35, 0, 0, 381, 382, 5, 8, 0, 0, 382, 
		    383, 3, 36, 18, 0, 383, 384, 5, 9, 0, 0, 384, 386, 1, 0, 0, 0, 385, 
		    369, 1, 0, 0, 0, 385, 380, 1, 0, 0, 0, 386, 67, 1, 0, 0, 0, 387, 388, 
		    5, 36, 0, 0, 388, 389, 5, 8, 0, 0, 389, 390, 3, 36, 18, 0, 390, 391, 
		    5, 83, 0, 0, 391, 394, 3, 36, 18, 0, 392, 393, 5, 83, 0, 0, 393, 395, 
		    3, 36, 18, 0, 394, 392, 1, 0, 0, 0, 394, 395, 1, 0, 0, 0, 395, 396, 
		    1, 0, 0, 0, 396, 397, 5, 9, 0, 0, 397, 409, 1, 0, 0, 0, 398, 399, 
		    5, 37, 0, 0, 399, 400, 5, 8, 0, 0, 400, 401, 3, 36, 18, 0, 401, 402, 
		    5, 9, 0, 0, 402, 409, 1, 0, 0, 0, 403, 404, 5, 38, 0, 0, 404, 405, 
		    5, 8, 0, 0, 405, 406, 3, 36, 18, 0, 406, 407, 5, 9, 0, 0, 407, 409, 
		    1, 0, 0, 0, 408, 387, 1, 0, 0, 0, 408, 398, 1, 0, 0, 0, 408, 403, 
		    1, 0, 0, 0, 409, 69, 1, 0, 0, 0, 410, 411, 5, 39, 0, 0, 411, 412, 
		    5, 8, 0, 0, 412, 413, 3, 36, 18, 0, 413, 414, 5, 83, 0, 0, 414, 417, 
		    3, 36, 18, 0, 415, 416, 5, 83, 0, 0, 416, 418, 3, 36, 18, 0, 417, 
		    415, 1, 0, 0, 0, 417, 418, 1, 0, 0, 0, 418, 419, 1, 0, 0, 0, 419, 
		    420, 5, 9, 0, 0, 420, 466, 1, 0, 0, 0, 421, 422, 5, 40, 0, 0, 422, 
		    423, 5, 8, 0, 0, 423, 424, 3, 36, 18, 0, 424, 425, 5, 83, 0, 0, 425, 
		    428, 3, 36, 18, 0, 426, 427, 5, 83, 0, 0, 427, 429, 3, 36, 18, 0, 
		    428, 426, 1, 0, 0, 0, 428, 429, 1, 0, 0, 0, 429, 430, 1, 0, 0, 0, 
		    430, 431, 5, 9, 0, 0, 431, 466, 1, 0, 0, 0, 432, 433, 5, 41, 0, 0, 
		    433, 434, 5, 8, 0, 0, 434, 435, 3, 36, 18, 0, 435, 436, 5, 83, 0, 
		    0, 436, 439, 3, 36, 18, 0, 437, 438, 5, 83, 0, 0, 438, 440, 3, 36, 
		    18, 0, 439, 437, 1, 0, 0, 0, 439, 440, 1, 0, 0, 0, 440, 441, 1, 0, 
		    0, 0, 441, 442, 5, 9, 0, 0, 442, 466, 1, 0, 0, 0, 443, 444, 5, 42, 
		    0, 0, 444, 445, 5, 8, 0, 0, 445, 446, 3, 36, 18, 0, 446, 447, 5, 83, 
		    0, 0, 447, 450, 3, 36, 18, 0, 448, 449, 5, 83, 0, 0, 449, 451, 3, 
		    36, 18, 0, 450, 448, 1, 0, 0, 0, 450, 451, 1, 0, 0, 0, 451, 452, 1, 
		    0, 0, 0, 452, 453, 5, 9, 0, 0, 453, 466, 1, 0, 0, 0, 454, 455, 5, 
		    43, 0, 0, 455, 456, 5, 8, 0, 0, 456, 457, 3, 36, 18, 0, 457, 458, 
		    5, 83, 0, 0, 458, 461, 3, 36, 18, 0, 459, 460, 5, 83, 0, 0, 460, 462, 
		    3, 36, 18, 0, 461, 459, 1, 0, 0, 0, 461, 462, 1, 0, 0, 0, 462, 463, 
		    1, 0, 0, 0, 463, 464, 5, 9, 0, 0, 464, 466, 1, 0, 0, 0, 465, 410, 
		    1, 0, 0, 0, 465, 421, 1, 0, 0, 0, 465, 432, 1, 0, 0, 0, 465, 443, 
		    1, 0, 0, 0, 465, 454, 1, 0, 0, 0, 466, 71, 1, 0, 0, 0, 467, 468, 5, 
		    44, 0, 0, 468, 470, 5, 8, 0, 0, 469, 471, 3, 60, 30, 0, 470, 469, 
		    1, 0, 0, 0, 470, 471, 1, 0, 0, 0, 471, 472, 1, 0, 0, 0, 472, 499, 
		    5, 9, 0, 0, 473, 474, 5, 45, 0, 0, 474, 476, 5, 8, 0, 0, 475, 477, 
		    3, 60, 30, 0, 476, 475, 1, 0, 0, 0, 476, 477, 1, 0, 0, 0, 477, 478, 
		    1, 0, 0, 0, 478, 499, 5, 9, 0, 0, 479, 480, 5, 46, 0, 0, 480, 482, 
		    5, 8, 0, 0, 481, 483, 3, 60, 30, 0, 482, 481, 1, 0, 0, 0, 482, 483, 
		    1, 0, 0, 0, 483, 484, 1, 0, 0, 0, 484, 499, 5, 9, 0, 0, 485, 486, 
		    5, 47, 0, 0, 486, 488, 5, 8, 0, 0, 487, 489, 3, 60, 30, 0, 488, 487, 
		    1, 0, 0, 0, 488, 489, 1, 0, 0, 0, 489, 490, 1, 0, 0, 0, 490, 499, 
		    5, 9, 0, 0, 491, 492, 5, 48, 0, 0, 492, 493, 5, 8, 0, 0, 493, 494, 
		    3, 36, 18, 0, 494, 495, 5, 83, 0, 0, 495, 496, 3, 36, 18, 0, 496, 
		    497, 5, 9, 0, 0, 497, 499, 1, 0, 0, 0, 498, 467, 1, 0, 0, 0, 498, 
		    473, 1, 0, 0, 0, 498, 479, 1, 0, 0, 0, 498, 485, 1, 0, 0, 0, 498, 
		    491, 1, 0, 0, 0, 499, 73, 1, 0, 0, 0, 500, 501, 5, 72, 0, 0, 501, 
		    502, 5, 50, 0, 0, 502, 503, 5, 91, 0, 0, 503, 504, 5, 85, 0, 0, 504, 
		    506, 3, 78, 39, 0, 505, 507, 3, 76, 38, 0, 506, 505, 1, 0, 0, 0, 506, 
		    507, 1, 0, 0, 0, 507, 508, 1, 0, 0, 0, 508, 509, 5, 84, 0, 0, 509, 
		    75, 1, 0, 0, 0, 510, 511, 5, 75, 0, 0, 511, 516, 5, 89, 0, 0, 512, 
		    513, 5, 83, 0, 0, 513, 515, 5, 89, 0, 0, 514, 512, 1, 0, 0, 0, 515, 
		    518, 1, 0, 0, 0, 516, 514, 1, 0, 0, 0, 516, 517, 1, 0, 0, 0, 517, 
		    77, 1, 0, 0, 0, 518, 516, 1, 0, 0, 0, 519, 520, 5, 56, 0, 0, 520, 
		    79, 1, 0, 0, 0, 521, 522, 5, 49, 0, 0, 522, 523, 5, 8, 0, 0, 523, 
		    524, 5, 89, 0, 0, 524, 525, 5, 82, 0, 0, 525, 526, 3, 36, 18, 0, 526, 
		    527, 5, 9, 0, 0, 527, 528, 3, 28, 14, 0, 528, 81, 1, 0, 0, 0, 529, 
		    530, 5, 81, 0, 0, 530, 531, 5, 8, 0, 0, 531, 532, 3, 4, 2, 0, 532, 
		    533, 3, 36, 18, 0, 533, 534, 5, 84, 0, 0, 534, 535, 3, 6, 3, 0, 535, 
		    536, 5, 9, 0, 0, 536, 537, 3, 28, 14, 0, 537, 83, 1, 0, 0, 0, 538, 
		    539, 5, 78, 0, 0, 539, 540, 5, 8, 0, 0, 540, 541, 3, 36, 18, 0, 541, 
		    542, 5, 9, 0, 0, 542, 551, 3, 28, 14, 0, 543, 544, 5, 79, 0, 0, 544, 
		    545, 5, 8, 0, 0, 545, 546, 3, 36, 18, 0, 546, 547, 5, 9, 0, 0, 547, 
		    548, 3, 28, 14, 0, 548, 550, 1, 0, 0, 0, 549, 543, 1, 0, 0, 0, 550, 
		    553, 1, 0, 0, 0, 551, 549, 1, 0, 0, 0, 551, 552, 1, 0, 0, 0, 552, 
		    556, 1, 0, 0, 0, 553, 551, 1, 0, 0, 0, 554, 555, 5, 80, 0, 0, 555, 
		    557, 3, 28, 14, 0, 556, 554, 1, 0, 0, 0, 556, 557, 1, 0, 0, 0, 557, 
		    85, 1, 0, 0, 0, 558, 559, 7, 4, 0, 0, 559, 87, 1, 0, 0, 0, 560, 561, 
		    7, 5, 0, 0, 561, 89, 1, 0, 0, 0, 562, 563, 7, 6, 0, 0, 563, 91, 1, 
		    0, 0, 0, 564, 565, 5, 89, 0, 0, 565, 566, 5, 87, 0, 0, 566, 567, 5, 
		    58, 0, 0, 567, 569, 5, 8, 0, 0, 568, 570, 3, 94, 47, 0, 569, 568, 
		    1, 0, 0, 0, 569, 570, 1, 0, 0, 0, 570, 571, 1, 0, 0, 0, 571, 572, 
		    5, 9, 0, 0, 572, 93, 1, 0, 0, 0, 573, 576, 3, 62, 31, 0, 574, 575, 
		    5, 83, 0, 0, 575, 577, 3, 62, 31, 0, 576, 574, 1, 0, 0, 0, 576, 577, 
		    1, 0, 0, 0, 577, 95, 1, 0, 0, 0, 51, 99, 115, 134, 141, 148, 161, 
		    175, 183, 193, 203, 213, 224, 232, 247, 255, 263, 271, 279, 287, 293, 
		    312, 316, 325, 328, 332, 338, 347, 356, 360, 367, 376, 385, 394, 408, 
		    417, 428, 439, 450, 461, 465, 470, 476, 482, 488, 498, 506, 516, 551, 
		    556, 569, 576];
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
		        $this->setState(99);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1125891048472834) !== 0) || (((($_la - 72)) & ~0x3f) === 0 && ((1 << ($_la - 72)) & 918127) !== 0)) {
		        	$this->setState(96);
		        	$this->statement();
		        	$this->setState(101);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(102);
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
		public function statement(): Context\StatementContext
		{
		    $localContext = new Context\StatementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_statement);

		    try {
		        $this->setState(115);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(104);
		        	    $this->varStmt();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(105);
		        	    $this->assignmentStmt();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(106);
		        	    $this->modelStmt();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(107);
		        	    $this->controllerStmt();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(108);
		        	    $this->routeStmt();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(109);
		        	    $this->middlewareStmt();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(110);
		        	    $this->ifStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(111);
		        	    $this->foreachStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(112);
		        	    $this->forStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(113);
		        	    $this->expressionStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(114);
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

		    $this->enterRule($localContext, 4, self::RULE_varStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(117);
		        $this->match(self::T__0);
		        $this->setState(118);
		        $this->match(self::ID);
		        $this->setState(119);
		        $this->match(self::EQUAL);
		        $this->setState(120);
		        $this->expression();
		        $this->setState(121);
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

		    $this->enterRule($localContext, 6, self::RULE_assignmentStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(123);
		        $this->match(self::ID);
		        $this->setState(124);
		        $this->match(self::EQUAL);
		        $this->setState(125);
		        $this->expression();
		        $this->setState(126);
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

		    $this->enterRule($localContext, 8, self::RULE_modelStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(128);
		        $this->match(self::MODEL);
		        $this->setState(129);
		        $this->match(self::ID);
		        $this->setState(130);
		        $this->match(self::T__1);
		        $this->setState(134);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 10)) & ~0x3f) === 0 && ((1 << ($_la - 10)) & 4611123068473966607) !== 0)) {
		        	$this->setState(131);
		        	$this->modelBody();
		        	$this->setState(136);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(137);
		        $this->match(self::T__2);
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

		    $this->enterRule($localContext, 10, self::RULE_modelBody);

		    try {
		        $this->setState(141);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::STRING_TYPE:
		            case self::TEXT_TYPE:
		            case self::INTEGER_TYPE:
		            case self::BIGINT_TYPE:
		            case self::UNSIGNED_BIGINT_TYPE:
		            case self::FLOAT_TYPE:
		            case self::DOUBLE_TYPE:
		            case self::DECIMAL_TYPE:
		            case self::BOOLEAN_TYPE:
		            case self::DATE_TYPE:
		            case self::DATETIME_TYPE:
		            case self::TIME_TYPE:
		            case self::TIMESTAMP_TYPE:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(139);
		            	$this->field();
		            	break;

		            case self::T__9:
		            case self::T__10:
		            case self::T__11:
		            case self::T__12:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(140);
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

		    $this->enterRule($localContext, 12, self::RULE_field);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(143);
		        $this->oalType();
		        $this->setState(144);
		        $this->match(self::ID);
		        $this->setState(148);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 240) !== 0)) {
		        	$this->setState(145);
		        	$this->fieldModifier();
		        	$this->setState(150);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(151);
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

		    $this->enterRule($localContext, 14, self::RULE_fieldModifier);

		    try {
		        $this->setState(161);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__3:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(153);
		            	$this->match(self::T__3);
		            	break;

		            case self::T__4:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(154);
		            	$this->match(self::T__4);
		            	break;

		            case self::T__5:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(155);
		            	$this->match(self::T__5);
		            	break;

		            case self::T__6:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(156);
		            	$this->match(self::T__6);
		            	$this->setState(157);
		            	$this->match(self::T__7);
		            	$this->setState(158);
		            	$this->expression();
		            	$this->setState(159);
		            	$this->match(self::T__8);
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

		    $this->enterRule($localContext, 16, self::RULE_relation);

		    try {
		        $this->setState(175);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__9:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(163);
		            	$this->match(self::T__9);
		            	$this->setState(164);
		            	$this->match(self::ID);
		            	$this->setState(165);
		            	$this->match(self::SEMICOLON);
		            	break;

		            case self::T__10:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(166);
		            	$this->match(self::T__10);
		            	$this->setState(167);
		            	$this->match(self::ID);
		            	$this->setState(168);
		            	$this->match(self::SEMICOLON);
		            	break;

		            case self::T__11:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(169);
		            	$this->match(self::T__11);
		            	$this->setState(170);
		            	$this->match(self::ID);
		            	$this->setState(171);
		            	$this->match(self::SEMICOLON);
		            	break;

		            case self::T__12:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(172);
		            	$this->match(self::T__12);
		            	$this->setState(173);
		            	$this->match(self::ID);
		            	$this->setState(174);
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

		    $this->enterRule($localContext, 18, self::RULE_controllerStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(177);
		        $this->match(self::CONTROLLER);
		        $this->setState(178);
		        $this->match(self::ID);
		        $this->setState(179);
		        $this->match(self::T__1);
		        $this->setState(181); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(180);
		        	$this->controllerBody();
		        	$this->setState(183); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::FUNCTION);
		        $this->setState(185);
		        $this->match(self::T__2);
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

		    $this->enterRule($localContext, 20, self::RULE_controllerBody);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(187);
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

		    $this->enterRule($localContext, 22, self::RULE_controllerMethod);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(189);
		        $this->match(self::FUNCTION);
		        $this->setState(190);
		        $this->match(self::CONTROLLER_METHOD_NAME);
		        $this->setState(191);
		        $this->match(self::T__7);
		        $this->setState(193);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ID) {
		        	$this->setState(192);
		        	$this->parameterList();
		        }
		        $this->setState(195);
		        $this->match(self::T__8);
		        $this->setState(196);
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

		    $this->enterRule($localContext, 24, self::RULE_parameterList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(198);
		        $this->parameter();
		        $this->setState(203);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(199);
		        	$this->match(self::COMMA);
		        	$this->setState(200);
		        	$this->parameter();
		        	$this->setState(205);
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

		    $this->enterRule($localContext, 26, self::RULE_parameter);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(206);
		        $this->match(self::ID);
		        $this->setState(207);
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

		    $this->enterRule($localContext, 28, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(209);
		        $this->match(self::T__1);
		        $this->setState(213);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1125891048472834) !== 0) || (((($_la - 72)) & ~0x3f) === 0 && ((1 << ($_la - 72)) & 918127) !== 0)) {
		        	$this->setState(210);
		        	$this->statement();
		        	$this->setState(215);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(216);
		        $this->match(self::T__2);
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

		    $this->enterRule($localContext, 30, self::RULE_middlewareStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(218);
		        $this->match(self::MIDDLEWARE);
		        $this->setState(219);
		        $this->match(self::ID);
		        $this->setState(220);
		        $this->match(self::T__1);
		        $this->setState(222); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(221);
		        	$this->middlewareMethod();
		        	$this->setState(224); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::FUNCTION);
		        $this->setState(226);
		        $this->match(self::T__2);
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

		    $this->enterRule($localContext, 32, self::RULE_middlewareMethod);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(228);
		        $this->match(self::FUNCTION);
		        $this->setState(229);
		        $this->match(self::T__13);
		        $this->setState(230);
		        $this->match(self::T__7);
		        $this->setState(232);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ID) {
		        	$this->setState(231);
		        	$this->parameterList();
		        }
		        $this->setState(234);
		        $this->match(self::T__8);
		        $this->setState(235);
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

		    $this->enterRule($localContext, 34, self::RULE_expressionStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(237);
		        $this->expression();
		        $this->setState(238);
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

		    $this->enterRule($localContext, 36, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(240);
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

		    $this->enterRule($localContext, 38, self::RULE_logicalOrExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(242);
		        $this->logicalAndExpr();
		        $this->setState(247);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__14) {
		        	$this->setState(243);
		        	$this->match(self::T__14);
		        	$this->setState(244);
		        	$this->logicalAndExpr();
		        	$this->setState(249);
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

		    $this->enterRule($localContext, 40, self::RULE_logicalAndExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(250);
		        $this->equalityExpr();
		        $this->setState(255);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__15) {
		        	$this->setState(251);
		        	$this->match(self::T__15);
		        	$this->setState(252);
		        	$this->equalityExpr();
		        	$this->setState(257);
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

		    $this->enterRule($localContext, 42, self::RULE_equalityExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(258);
		        $this->relationalExpr();
		        $this->setState(263);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__16 || $_la === self::T__17) {
		        	$this->setState(259);

		        	$_la = $this->input->LA(1);

		        	if (!($_la === self::T__16 || $_la === self::T__17)) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(260);
		        	$this->relationalExpr();
		        	$this->setState(265);
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

		    $this->enterRule($localContext, 44, self::RULE_relationalExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(266);
		        $this->additiveExpr();
		        $this->setState(271);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 7864320) !== 0)) {
		        	$this->setState(267);

		        	$_la = $this->input->LA(1);

		        	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 7864320) !== 0))) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(268);
		        	$this->additiveExpr();
		        	$this->setState(273);
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

		    $this->enterRule($localContext, 46, self::RULE_additiveExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(274);
		        $this->multiplicativeExpr();
		        $this->setState(279);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__22 || $_la === self::T__23) {
		        	$this->setState(275);

		        	$_la = $this->input->LA(1);

		        	if (!($_la === self::T__22 || $_la === self::T__23)) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(276);
		        	$this->multiplicativeExpr();
		        	$this->setState(281);
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

		    $this->enterRule($localContext, 48, self::RULE_multiplicativeExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(282);
		        $this->unaryExpr();
		        $this->setState(287);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 234881024) !== 0)) {
		        	$this->setState(283);

		        	$_la = $this->input->LA(1);

		        	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 234881024) !== 0))) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(284);
		        	$this->unaryExpr();
		        	$this->setState(289);
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

		    $this->enterRule($localContext, 50, self::RULE_unaryExpr);

		    try {
		        $this->setState(293);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__27:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(290);
		            	$this->match(self::T__27);
		            	$this->setState(291);
		            	$this->unaryExpr();
		            	break;

		            case self::T__7:
		            case self::T__28:
		            case self::T__29:
		            case self::T__30:
		            case self::T__31:
		            case self::T__33:
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
		            case self::ID:
		            case self::NUMBER:
		            case self::STRING:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(292);
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

		    $this->enterRule($localContext, 52, self::RULE_atom);

		    try {
		        $this->setState(312);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 20, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(295);
		        	    $this->match(self::T__7);
		        	    $this->setState(296);
		        	    $this->expression();
		        	    $this->setState(297);
		        	    $this->match(self::T__8);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(299);
		        	    $this->sessionFunction();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(300);
		        	    $this->cookieFunction();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(301);
		        	    $this->modelMethodCall();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(302);
		        	    $this->functionCall();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(303);
		        	    $this->responseFunction();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(304);
		        	    $this->httpFetchFunction();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(305);
		        	    $this->idChain();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(306);
		        	    $this->match(self::STRING);
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(307);
		        	    $this->match(self::NUMBER);
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(308);
		        	    $this->match(self::T__28);
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(309);
		        	    $this->match(self::T__29);
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(310);
		        	    $this->match(self::T__30);
		        	break;

		        	case 14:
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(311);
		        	    $this->arrayLiteral();
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
		public function returnStmt(): Context\ReturnStmtContext
		{
		    $localContext = new Context\ReturnStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(314);
		        $this->match(self::RETURN);
		        $this->setState(316);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562941095051520) !== 0) || (((($_la - 89)) & ~0x3f) === 0 && ((1 << ($_la - 89)) & 7) !== 0)) {
		        	$this->setState(315);
		        	$this->expression();
		        }
		        $this->setState(318);
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

		    $this->enterRule($localContext, 56, self::RULE_idChain);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(320);
		        $this->match(self::ID);
		        $this->setState(332);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::DOT) {
		        	$this->setState(321);
		        	$this->match(self::DOT);
		        	$this->setState(322);
		        	$this->match(self::ID);
		        	$this->setState(328);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);

		        	if ($_la === self::T__7) {
		        		$this->setState(323);
		        		$this->match(self::T__7);
		        		$this->setState(325);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);

		        		if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562941095051520) !== 0) || (((($_la - 89)) & ~0x3f) === 0 && ((1 << ($_la - 89)) & 7) !== 0)) {
		        			$this->setState(324);
		        			$this->argumentList();
		        		}
		        		$this->setState(327);
		        		$this->match(self::T__8);
		        	}
		        	$this->setState(334);
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

		    $this->enterRule($localContext, 58, self::RULE_functionCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(335);
		        $this->match(self::ID);
		        $this->setState(336);
		        $this->match(self::T__7);
		        $this->setState(338);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562941095051520) !== 0) || (((($_la - 89)) & ~0x3f) === 0 && ((1 << ($_la - 89)) & 7) !== 0)) {
		        	$this->setState(337);
		        	$this->argumentList();
		        }
		        $this->setState(340);
		        $this->match(self::T__8);
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

		    $this->enterRule($localContext, 60, self::RULE_argumentList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(342);
		        $this->expression();
		        $this->setState(347);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(343);
		        	$this->match(self::COMMA);
		        	$this->setState(344);
		        	$this->expression();
		        	$this->setState(349);
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

		    $this->enterRule($localContext, 62, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(350);
		        $this->match(self::T__31);
		        $this->setState(351);
		        $this->arrayElement();
		        $this->setState(356);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 27, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(352);
		        		$this->match(self::COMMA);
		        		$this->setState(353);
		        		$this->arrayElement(); 
		        	}

		        	$this->setState(358);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 27, $this->ctx);
		        }
		        $this->setState(360);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::COMMA) {
		        	$this->setState(359);
		        	$this->match(self::COMMA);
		        }
		        $this->setState(362);
		        $this->match(self::T__32);
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

		    $this->enterRule($localContext, 64, self::RULE_arrayElement);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(364);
		        $this->expression();
		        $this->setState(367);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ARROW_ASSOC) {
		        	$this->setState(365);
		        	$this->match(self::ARROW_ASSOC);
		        	$this->setState(366);
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

		    $this->enterRule($localContext, 66, self::RULE_sessionFunction);

		    try {
		        $this->setState(385);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__33:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(369);
		            	$this->match(self::T__33);
		            	$this->setState(370);
		            	$this->match(self::T__7);
		            	$this->setState(371);
		            	$this->expression();
		            	$this->setState(372);
		            	$this->match(self::COMMA);
		            	$this->setState(373);
		            	$this->expression();
		            	$this->setState(376);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(374);
		            		$this->match(self::COMMA);
		            		$this->setState(375);
		            		$this->expression();
		            	}
		            	$this->setState(378);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__34:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(380);
		            	$this->match(self::T__34);
		            	$this->setState(381);
		            	$this->match(self::T__7);
		            	$this->setState(382);
		            	$this->expression();
		            	$this->setState(383);
		            	$this->match(self::T__8);
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

		    $this->enterRule($localContext, 68, self::RULE_cookieFunction);

		    try {
		        $this->setState(408);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__35:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(387);
		            	$this->match(self::T__35);
		            	$this->setState(388);
		            	$this->match(self::T__7);
		            	$this->setState(389);
		            	$this->expression();
		            	$this->setState(390);
		            	$this->match(self::COMMA);
		            	$this->setState(391);
		            	$this->expression();
		            	$this->setState(394);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(392);
		            		$this->match(self::COMMA);
		            		$this->setState(393);
		            		$this->expression();
		            	}
		            	$this->setState(396);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__36:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(398);
		            	$this->match(self::T__36);
		            	$this->setState(399);
		            	$this->match(self::T__7);
		            	$this->setState(400);
		            	$this->expression();
		            	$this->setState(401);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__37:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(403);
		            	$this->match(self::T__37);
		            	$this->setState(404);
		            	$this->match(self::T__7);
		            	$this->setState(405);
		            	$this->expression();
		            	$this->setState(406);
		            	$this->match(self::T__8);
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

		    $this->enterRule($localContext, 70, self::RULE_httpFetchFunction);

		    try {
		        $this->setState(465);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__38:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(410);
		            	$this->match(self::T__38);
		            	$this->setState(411);
		            	$this->match(self::T__7);
		            	$this->setState(412);
		            	$this->expression();
		            	$this->setState(413);
		            	$this->match(self::COMMA);
		            	$this->setState(414);
		            	$this->expression();
		            	$this->setState(417);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(415);
		            		$this->match(self::COMMA);
		            		$this->setState(416);
		            		$this->expression();
		            	}
		            	$this->setState(419);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__39:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(421);
		            	$this->match(self::T__39);
		            	$this->setState(422);
		            	$this->match(self::T__7);
		            	$this->setState(423);
		            	$this->expression();
		            	$this->setState(424);
		            	$this->match(self::COMMA);
		            	$this->setState(425);
		            	$this->expression();
		            	$this->setState(428);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(426);
		            		$this->match(self::COMMA);
		            		$this->setState(427);
		            		$this->expression();
		            	}
		            	$this->setState(430);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__40:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(432);
		            	$this->match(self::T__40);
		            	$this->setState(433);
		            	$this->match(self::T__7);
		            	$this->setState(434);
		            	$this->expression();
		            	$this->setState(435);
		            	$this->match(self::COMMA);
		            	$this->setState(436);
		            	$this->expression();
		            	$this->setState(439);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(437);
		            		$this->match(self::COMMA);
		            		$this->setState(438);
		            		$this->expression();
		            	}
		            	$this->setState(441);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__41:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(443);
		            	$this->match(self::T__41);
		            	$this->setState(444);
		            	$this->match(self::T__7);
		            	$this->setState(445);
		            	$this->expression();
		            	$this->setState(446);
		            	$this->match(self::COMMA);
		            	$this->setState(447);
		            	$this->expression();
		            	$this->setState(450);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(448);
		            		$this->match(self::COMMA);
		            		$this->setState(449);
		            		$this->expression();
		            	}
		            	$this->setState(452);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__42:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(454);
		            	$this->match(self::T__42);
		            	$this->setState(455);
		            	$this->match(self::T__7);
		            	$this->setState(456);
		            	$this->expression();
		            	$this->setState(457);
		            	$this->match(self::COMMA);
		            	$this->setState(458);
		            	$this->expression();
		            	$this->setState(461);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::COMMA) {
		            		$this->setState(459);
		            		$this->match(self::COMMA);
		            		$this->setState(460);
		            		$this->expression();
		            	}
		            	$this->setState(463);
		            	$this->match(self::T__8);
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

		    $this->enterRule($localContext, 72, self::RULE_responseFunction);

		    try {
		        $this->setState(498);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__43:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(467);
		            	$this->match(self::T__43);
		            	$this->setState(468);
		            	$this->match(self::T__7);
		            	$this->setState(470);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562941095051520) !== 0) || (((($_la - 89)) & ~0x3f) === 0 && ((1 << ($_la - 89)) & 7) !== 0)) {
		            		$this->setState(469);
		            		$this->argumentList();
		            	}
		            	$this->setState(472);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__44:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(473);
		            	$this->match(self::T__44);
		            	$this->setState(474);
		            	$this->match(self::T__7);
		            	$this->setState(476);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562941095051520) !== 0) || (((($_la - 89)) & ~0x3f) === 0 && ((1 << ($_la - 89)) & 7) !== 0)) {
		            		$this->setState(475);
		            		$this->argumentList();
		            	}
		            	$this->setState(478);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__45:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(479);
		            	$this->match(self::T__45);
		            	$this->setState(480);
		            	$this->match(self::T__7);
		            	$this->setState(482);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562941095051520) !== 0) || (((($_la - 89)) & ~0x3f) === 0 && ((1 << ($_la - 89)) & 7) !== 0)) {
		            		$this->setState(481);
		            		$this->argumentList();
		            	}
		            	$this->setState(484);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__46:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(485);
		            	$this->match(self::T__46);
		            	$this->setState(486);
		            	$this->match(self::T__7);
		            	$this->setState(488);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 562941095051520) !== 0) || (((($_la - 89)) & ~0x3f) === 0 && ((1 << ($_la - 89)) & 7) !== 0)) {
		            		$this->setState(487);
		            		$this->argumentList();
		            	}
		            	$this->setState(490);
		            	$this->match(self::T__8);
		            	break;

		            case self::T__47:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(491);
		            	$this->match(self::T__47);
		            	$this->setState(492);
		            	$this->match(self::T__7);
		            	$this->setState(493);
		            	$this->expression();
		            	$this->setState(494);
		            	$this->match(self::COMMA);
		            	$this->setState(495);
		            	$this->expression();
		            	$this->setState(496);
		            	$this->match(self::T__8);
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

		    $this->enterRule($localContext, 74, self::RULE_routeStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(500);
		        $this->match(self::ROUTE);
		        $this->setState(501);
		        $this->match(self::HTTP_METHOD);
		        $this->setState(502);
		        $this->match(self::STRING);
		        $this->setState(503);
		        $this->match(self::ARROW);
		        $this->setState(504);
		        $this->controllerRef();
		        $this->setState(506);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::MIDDLEWARE) {
		        	$this->setState(505);
		        	$this->middlewareList();
		        }
		        $this->setState(508);
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

		    $this->enterRule($localContext, 76, self::RULE_middlewareList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(510);
		        $this->match(self::MIDDLEWARE);
		        $this->setState(511);
		        $this->match(self::ID);
		        $this->setState(516);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(512);
		        	$this->match(self::COMMA);
		        	$this->setState(513);
		        	$this->match(self::ID);
		        	$this->setState(518);
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

		    $this->enterRule($localContext, 78, self::RULE_controllerRef);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(519);
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

		    $this->enterRule($localContext, 80, self::RULE_foreachStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(521);
		        $this->match(self::T__48);
		        $this->setState(522);
		        $this->match(self::T__7);
		        $this->setState(523);
		        $this->match(self::ID);
		        $this->setState(524);
		        $this->match(self::IN);
		        $this->setState(525);
		        $this->expression();
		        $this->setState(526);
		        $this->match(self::T__8);
		        $this->setState(527);
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

		    $this->enterRule($localContext, 82, self::RULE_forStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(529);
		        $this->match(self::FOR);
		        $this->setState(530);
		        $this->match(self::T__7);
		        $this->setState(531);
		        $this->varStmt();
		        $this->setState(532);
		        $this->expression();
		        $this->setState(533);
		        $this->match(self::SEMICOLON);
		        $this->setState(534);
		        $this->assignmentStmt();
		        $this->setState(535);
		        $this->match(self::T__8);
		        $this->setState(536);
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
		public function ifStmt(): Context\IfStmtContext
		{
		    $localContext = new Context\IfStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 84, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(538);
		        $this->match(self::IF);
		        $this->setState(539);
		        $this->match(self::T__7);
		        $this->setState(540);
		        $this->expression();
		        $this->setState(541);
		        $this->match(self::T__8);
		        $this->setState(542);
		        $this->block();
		        $this->setState(551);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::ELSEIF) {
		        	$this->setState(543);
		        	$this->match(self::ELSEIF);
		        	$this->setState(544);
		        	$this->match(self::T__7);
		        	$this->setState(545);
		        	$this->expression();
		        	$this->setState(546);
		        	$this->match(self::T__8);
		        	$this->setState(547);
		        	$this->block();
		        	$this->setState(553);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(556);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(554);
		        	$this->match(self::ELSE);
		        	$this->setState(555);
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

		    $this->enterRule($localContext, 86, self::RULE_comparisonOperator);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(558);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 8257536) !== 0))) {
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

		    $this->enterRule($localContext, 88, self::RULE_logicalOperator);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(560);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::T__14 || $_la === self::T__15)) {
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

		    $this->enterRule($localContext, 90, self::RULE_oalType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(562);

		        $_la = $this->input->LA(1);

		        if (!((((($_la - 59)) & ~0x3f) === 0 && ((1 << ($_la - 59)) & 8191) !== 0))) {
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

		    $this->enterRule($localContext, 92, self::RULE_modelMethodCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(564);
		        $this->match(self::ID);
		        $this->setState(565);
		        $this->match(self::DOT);
		        $this->setState(566);
		        $this->match(self::MODEL_METHOD);
		        $this->setState(567);
		        $this->match(self::T__7);
		        $this->setState(569);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__31) {
		        	$this->setState(568);
		        	$this->modelMethodParams();
		        }
		        $this->setState(571);
		        $this->match(self::T__8);
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

		    $this->enterRule($localContext, 94, self::RULE_modelMethodParams);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(573);
		        $this->arrayLiteral();
		        $this->setState(576);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::COMMA) {
		        	$this->setState(574);
		        	$this->match(self::COMMA);
		        	$this->setState(575);
		        	$this->arrayLiteral();
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

	    public function BIGINT_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::BIGINT_TYPE, 0);
	    }

	    public function UNSIGNED_BIGINT_TYPE(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::UNSIGNED_BIGINT_TYPE, 0);
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

	    public function COMMA(): ?TerminalNode
	    {
	        return $this->getToken(OALParser::COMMA, 0);
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