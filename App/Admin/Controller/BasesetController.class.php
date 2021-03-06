<?php
/**
 * BasesetController.class.php
 * 风行者广告推广系统
 * Copy right 2020-2030 风行者 保留所有权利。
 * 官方网址: https://fxz.nixi.win/
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用。
 * 任何企业和个人不允许对程序代码以任何形式任何目的再发布。
 * @author John Doe <john.doe@example.com>
 * @date 2020-01-20
 * @version v2.0.22
 */
namespace Admin\Controller;
class BasesetController extends BaseController{
    public function _initialize() {
        parent::_initialize();
        $this->tbname = 'base_set';
    }
    protected function _before_index(){
        /*$data = [];
        $data['xname'] = '下单屏蔽';
        $data['var'] = 'order_deny';
        $data['value'] = '尼玛,12316250409';
        $data['desc'] = '用于禁止恶意下单,可填客户姓名或手机号,多个用","分割!';
        $data['addtime'] = time();*/
        //M($this->tbname)->data($data)->add();
        
        $thead = [
            'bsid' => 'BIID',
            'xname' => '名称',
            'var' => '字段名',
            'value' => '字段值',
            'desc' => '描述',
            #'addtime' => '创建时间',
        ];
        $this->assign('thead', $thead);
    }
    //
    protected function _after_list($volist){
        if($volist){
            foreach($volist as $key => $row){
                $volist[$key]['addtime'] = date('Y-m-d H:i:s', $row['addtime']);
            }
        }
        return $volist;
    }
    //
    protected function _after_save($data){
        S('init_set', null);
    }
}
/**
$data = [];
        $data['xname'] = '下单提示';
        $data['var'] = 'order_tips';
        $data['value'] = '您的订单提交成功，请稍候留意短信通知!';
        $data['desc'] = '设置客户下单成功后，页面的提示信息!';
        $data['addtime'] = time();
        M($this->tbname)->data($data)->add();
 */