grammar OAL;

// ================= Program =================
program: (importStmt | requireStmt | statement)* EOF;

// ================= Import =================
importStmt
    : 'import' ID 'from' idPath SEMICOLON
    ;

// ================= Require =================
requireStmt
    : REQUIRE STRING SEMICOLON
    ;

idPath
    : ID (DOT ID)*
    ;

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
    | whileStmt
    | breakStmt
    | continueStmt
    | tryCatchStmt
    | throwStmt
    | validateStmt
    | expressionStmt
    | returnStmt
    ;

// ================= Variable Declaration =================
varStmt
    : 'var' ID EQUAL expression SEMICOLON
    ;

assignmentStmt
    : ID EQUAL expression SEMICOLON
    ;

// ================= Database Models =================
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
    : 'hasOne' ID SEMICOLON
    | 'hasMany' ID SEMICOLON
    | 'belongsTo' ID SEMICOLON
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
    : (oalType | ID) ID
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
    : logicalAndExpr (OR logicalAndExpr)*
    ;

logicalAndExpr
    : equalityExpr (AND equalityExpr)*
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
    | newExpr
    ;

newExpr
    : NEW ID '(' argumentList? ')'
    ;

// ================= Return Statement =================
returnStmt
    : RETURN expression? SEMICOLON
    ;

// ================= ID + Property/Method Chain =================
idChain
    : ID ( (DOT ID | '[' expression ']') ('(' argumentList? ')')? )*
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
    | 'removeSession' '(' expression ')'
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
    ;

// ================= Response Functions =================
responseFunction
    : 'json' '(' argumentList? ')'
    | 'html' '(' argumentList? ')'
    | 'redirect' '(' argumentList? ')'
    | 'print' '(' argumentList? ')'
    | 'render' '(' expression (COMMA expression)? ')'
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

// ================= WHILE Loop =================
whileStmt
    : WHILE '(' expression ')' block
    ;

breakStmt
    : BREAK SEMICOLON
    ;

continueStmt
    : CONTINUE SEMICOLON
    ;

tryCatchStmt
    : TRY block CATCH '(' ID ID ')' block
    ;

throwStmt
    : THROW ID '(' expression? ')' SEMICOLON
    ;

validateStmt
    : VALIDATE arrayLiteral SEMICOLON
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
    | BIGINTEGER_TYPE
    | FLOAT_TYPE
    | DOUBLE_TYPE
    | DECIMAL_TYPE
    | BOOLEAN_TYPE
    | DATE_TYPE
    | DATETIME_TYPE
    | TIME_TYPE
    | TIMESTAMP_TYPE
    ;

STRING_TYPE          : 'string';
TEXT_TYPE            : 'text';
INTEGER_TYPE         : 'integer';
BIGINTEGER_TYPE      : 'bigInteger';
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
IF         : 'if';
ELSEIF     : 'elseif';
ELSE       : 'else';
FOR        : 'for';
WHILE      : 'while';
BREAK      : 'break';
CONTINUE   : 'continue';
TRY        : 'try';
CATCH      : 'catch';
THROW      : 'throw';
VALIDATE   : 'validate';
REQUIRE    : 'require';
NEW        : 'new';
IN         : 'in';

// === Symbols ===
COMMA       : ',' ;
SEMICOLON   : ';' ;
COLON       : ':' ;
DOT         : '.' ;
EQUAL       : '=' ;
ARROW       : '->' ;
ARROW_ASSOC : '=>' ;
OR          : '||' ;
AND         : '&&' ;

// ================= Controllers =================
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
    | 'modelDataTable'
    ;

modelMethodParams
    : arrayLiteral (COMMA arrayLiteral)*
    ;

// ================= HTTP Methods =================
HTTP_METHOD: 'get' | 'post' | 'put' | 'delete' | 'patch';

// === Basic Tokens ===
ID      : [a-zA-Z_][a-zA-Z0-9_]* ;
NUMBER  : [0-9]+ ('.' [0-9]+)? ;
STRING  : '"' ( ~["\\] | '\\' . )* '"' ;

// === Comments & Whitespace ===
LINE_COMMENT : '//' ~[\r\n]* -> skip ;
BLOCK_COMMENT: '/*' ( . | '\r' | '\n' )*? '*/' -> skip ;
WS      : [ \t\r\n]+ -> skip ;
