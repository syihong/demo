#sql语句一对多join成1行去重: 
	采用group by形式和采用子查询方式
	

#group by形式
SELECT  a.orderid, a.deliverid, a.state, a.number,count(b.orderid) as count
FROM yun_order a
left join yun_order  b on a.deliverid = b.deliverid AND b.state NOT IN ('0', '10', '11')
group By a.orderid;

#子查询方式
SELECT distinct a.orderid, a.deliverid, a.state, a.number,(SELECT count(*) from yun_order b where a.deliverid = b.deliverid AND b.state NOT IN ('0', '10', '11') ) as count
FROM yun_order a;