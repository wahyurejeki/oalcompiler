grammar OAL;

// ================= Program =================
program: statement* EOF;

// ================= Statements =================
statement
    : varStmt
    | assignmentStmt
    | modelStmt
    | controllerStmt
    | routeStmt
    | middlewareStmt
    | ifStmt
    | foreachStmt
    | forStmt
    | expressionStmt
    | returnStmt
    ;

// ================= Variable Declaration =================
varStmt
    : 'var' ID EQUAL expression SEMICOLON
    ;

// ================= Assignment =================
assignmentStmt
    : ID EQUAL expression SEMICOLON
    ;

// ================= Models =================
modelStmt
    : MODEL ID '{' modelBody* '}'
    ;

modelBody
    : field
    | relation
    ;

field
    : oalType ID fieldModifier* SEMICOLON
    ;

fieldModifier
    : 'primary'
    | 'unique'
    | 'nullable'
    | 'default' '(' expression ')'
    ;

relation
    : 'hasMany' ID SEMICOLON
    | 'belongsTo' ID SEMICOLON
    | 'hasOne' ID SEMICOLON
    | 'belongsToMany' ID SEMICOLON
    ;

// ================= Controllers =================
controllerStmt
    : CONTROLLER ID '{' controllerBody+ '}'
    ;

controllerBody
    : controllerMethod
    ;

controllerMethod
    : FUNCTION CONTROLLER_METHOD_NAME '(' parameterList? ')' block
    ;

parameterList
    : parameter (COMMA parameter)*
    ;

parameter
    : ID ID
    ;

// ================= Block =================
block
    : '{' statement* '}'
    ;

// ================= Middleware =================
middlewareStmt
    : MIDDLEWARE ID '{' middlewareMethod+ '}'
    ;

middlewareMethod
    : FUNCTION 'handleAction' '(' parameterList? ')' block
    ;

// ================= Expressions =================
expressionStmt
    : expression SEMICOLON
    ;

expression
    : logicalOrExpr
    ;

logicalOrExpr
    : logicalAndExpr ('||' logicalAndExpr)*
    ;

logicalAndExpr
    : equalityExpr ('&&' equalityExpr)*
    ;

equalityExpr
    : relationalExpr (('==' | '!=') relationalExpr)*
    ;

relationalExpr
    : additiveExpr (('<' | '<=' | '>' | '>=') additiveExpr)*
    ;

additiveExpr
    : multiplicativeExpr (('+' | '-') multiplicativeExpr)*
    ;

multiplicativeExpr
    : unaryExpr (('*' | '/' | '%') unaryExpr)*
    ;

unaryExpr
    : '!' unaryExpr
    | atom
    ;

// ================= Atom =================
atom
    : '(' expression ')'
    | sessionFunction
    | cookieFunction
    | modelMethodCall
    | functionCall
    | responseFunction
    | httpFetchFunction
    | idChain
    | STRING
    | NUMBER
    | 'true'
    | 'false'
    | 'null'
    | arrayLiteral
    ;

// ================= Return Statement =================
returnStmt
    : RETURN expression? SEMICOLON
    ;

// ================= ID + Property/Method Chain =================
idChain
    : ID (DOT ID ('(' argumentList? ')')? )*
    ;

// ================= Function Call =================
functionCall
    : ID '(' argumentList? ')'
    ;

argumentList
    : expression (COMMA expression)*
    ;

// ================= Array Literals =================
arrayLiteral
    : '[' arrayElement (COMMA arrayElement)* (COMMA)? ']'
    ;

arrayElement
    : expression (ARROW_ASSOC expression)?
    ;

// ================= Session & Cookie Functions =================
sessionFunction
    : 'setSession' '(' expression COMMA expression (COMMA expression)? ')'
    | 'getSession' '(' expression ')'
    ;

cookieFunction
    : 'setCookie' '(' expression COMMA expression (COMMA expression)? ')'
    | 'getCookie' '(' expression ')'
    | 'removeCookie' '(' expression ')'
    ;

// ================= HTTP Fetch Functions =================
httpFetchFunction
    : 'fetchGet' '(' expression COMMA expression (COMMA expression)? ')' //return object
    | 'fetchPost' '(' expression COMMA expression (COMMA expression)? ')'
    | 'fetchPut' '(' expression COMMA expression (COMMA expression)? ')'
    | 'fetchPatch' '(' expression COMMA expression (COMMA expression)? ')'
    | 'fetchDelete' '(' expression COMMA expression (COMMA expression)? ')'
    ;

// ================= Built-in Response =================
responseFunction
    : 'json' '(' argumentList? ')'
    | 'html' '(' argumentList? ')'
    | 'redirect' '(' argumentList? ')'
    | 'print' '(' argumentList? ')'
    | 'split' '(' expression COMMA expression ')'  // returns array
    ;

// ================= Routes =================
routeStmt
    : ROUTE HTTP_METHOD STRING ARROW controllerRef middlewareList? SEMICOLON
    ;

middlewareList
    : MIDDLEWARE ID (COMMA ID)*
    ;

controllerRef
    : CONTROLLER_METHOD
    ;

// ================= FOREACH Loop =================
foreachStmt
    : 'foreach' '(' ID IN expression ')' block
    ;

// ================= C-style FOR Loop =================
forStmt
    : FOR '(' varStmt expression SEMICOLON assignmentStmt ')' block
    ;

// ================= If Statement =================
ifStmt
    : IF '(' expression ')' block
      ( ELSEIF '(' expression ')' block )*
      ( ELSE block )?
    ;

// ================= Comparison & Logic =================
comparisonOperator
    : '==' | '!=' | '<' | '<=' | '>' | '>='
    ;

logicalOperator
    : '&&' | '||'
    ;

// ================= Oal Types =================
oalType
    : STRING_TYPE
    | TEXT_TYPE
    | INTEGER_TYPE
    | BIGINT_TYPE
    | UNSIGNED_BIGINT_TYPE
    | FLOAT_TYPE
    | DOUBLE_TYPE
    | DECIMAL_TYPE
    | BOOLEAN_TYPE
    | DATE_TYPE
    | DATETIME_TYPE
    | TIME_TYPE
    | TIMESTAMP_TYPE
    ;

// ================= HTTP METHODS =================
HTTP_METHOD
    : HTTP_GET
    | HTTP_POST
    | HTTP_PUT
    | HTTP_DELETE
    | HTTP_PATCH
    ;

HTTP_GET    : 'get';
HTTP_POST   : 'post';
HTTP_PUT    : 'put';
HTTP_DELETE : 'delete';
HTTP_PATCH  : 'patch';

// ================= CONTROLLER METHOD =================
CONTROLLER_METHOD
    : [a-zA-Z_][a-zA-Z0-9_]* '@' CONTROLLER_METHOD_NAME
    ;

CONTROLLER_METHOD_NAME
    : [a-zA-Z_][a-zA-Z0-9_]* 'Action'
    ;

// ================= Built-in ORM Methods =================
modelMethodCall
    : ID DOT MODEL_METHOD '(' modelMethodParams? ')'
    ;

MODEL_METHOD
    : 'modelFindAll'
    | 'modelFindOne'
    | 'modelCreate'
    | 'modelUpdate'
    | 'modelDelete'
    | 'modelCount'
    ;

modelMethodParams
    : arrayLiteral (COMMA arrayLiteral)?
    ;

// ================= Lexer Tokens =================
STRING_TYPE          : 'string';
TEXT_TYPE            : 'text';
INTEGER_TYPE         : 'integer';
BIGINT_TYPE          : 'bigInteger';
UNSIGNED_BIGINT_TYPE : 'unsignedBigInteger';
FLOAT_TYPE           : 'float';
DOUBLE_TYPE          : 'double';
DECIMAL_TYPE         : 'decimal';
BOOLEAN_TYPE         : 'boolean';
DATE_TYPE            : 'date';
DATETIME_TYPE        : 'datetime';
TIME_TYPE            : 'time';
TIMESTAMP_TYPE       : 'timestamp';

// === Keywords ===
ROUTE      : 'route';
MODEL      : 'model';
CONTROLLER : 'controller';
MIDDLEWARE : 'middleware';
FUNCTION   : 'function';
RETURN     : 'return';

IF      : 'if';
ELSEIF  : 'elseif';
ELSE    : 'else';
FOR     : 'for';
IN      : 'in';

// === Symbols ===
COMMA       : ',' ;
SEMICOLON   : ';' ;
ARROW       : '->' ;
ARROW_ASSOC : '=>' ;
DOT         : '.' ;
EQUAL       : '=' ;

// === ID, Literals ===
ID      : [a-zA-Z_][a-zA-Z0-9_]* ;
NUMBER  : [0-9]+ ('.' [0-9]+)? ;
STRING  : '"' ( ~["\\] | '\\' . )* '"' ;

// === Comments & Whitespace ===
LINE_COMMENT : '//' ~[\r\n]* -> skip ;
BLOCK_COMMENT: '/*' ( . | '\r' | '\n' )*? '*/' -> skip ;
WS      : [ \t\r\n]+ -> skip ;
