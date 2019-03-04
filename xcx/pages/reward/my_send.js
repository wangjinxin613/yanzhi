//index.js
//获取应用实例
const app = getApp()
Page({
	data: {
		motto: '赞赏看图',
		userInfo: {},
		hasUserInfo: false,
		canIUse: wx.canIUse('button.open-type.getUserInfo'),
		isSelect: ['active','no','no','no','no','no'],
		data_list:{},
		prepay_id:'',
		lid:'',
		money:1.88, //打赏金钱		lid:''//列表id
		nonce_str:'',
		sign:''
	},
	changeIndicatorDots: function (e) {
		this.setData({
			indicatorDots: !this.data.indicatorDots
		})
	},
	changeAutoplay: function (e) {
		this.setData({
			autoplay: !this.data.autoplay
		})
	},
	intervalChange: function (e) {
		this.setData({
			interval: e.detail.value
		})
	},
	durationChange: function (e) {
		this.setData({
			duration: e.detail.value
		})
	},
	//事件处理函数
	bindViewTap: function () {
		wx.navigateTo({
			url: '../logs/logs'
		})
	},
	//选择打赏金额
	selectBtn: function(event){
		var number = event.currentTarget.dataset.hi;
		var shuzu = Array('active','no', 'no', 'no', 'no', 'no');
		for (var i = 0; i < 6; i++) {
			shuzu[i] = 'no';
		}
		shuzu[number] = 'active';
		this.setData({
			"isSelect": shuzu,
			"money": event.currentTarget.dataset.money
		});
		console.log(this.data.money);
	},
	//提交打赏函数
	rewardSuccess:function(){
		var that = this;
		//提交订单到数据库
		app.connect("rewardOrderForm.php",{
			uid:app.globalData.userInfo.id,
			money:that.data.money,
			lid:that.data.lid,
			nickName:app.globalData.userInfo.nickName,
			avatarUrl:app.globalData.userInfo.avatarUrl
		},function(e){
			var order_id = e; //订单id
			wx.request({
				url: app.globalData.url + "/wxpay/index.php",
				data: {
					money: that.data.money,
					order_id: order_id,
					openid: app.globalData.userInfo.openId
				},
				method: "POST",
				dataType: "json",
				header: {
					'content-type': 'application/x-www-form-urlencoded'
				},
				success: function (e) {
					//小程序唤起支付
					console.log(e);
					wx.requestPayment({
						timeStamp: e.data.timeStamp, //时间
						nonceStr: e.data.nonce_str, //随机字符创
						package: "prepay_id="+e.data.prepay_id,
						signType: "MD5",
						paySign: e.data.sign,
						success:function(e){
							//成功后处理
							app.connect("rewardSuccess.php",{order_id:order_id},function(e){
								console.log(e);
								that.ylimg(e.data);
							});
						},
						fail: function (e) {
							console.log(e);
						}
					});
				}
			})
			//创建订单之后发起支付
		
		
		});
	},
	//发起微信支付获取req  
	wx_pay:function(order_id){
		var that = this;
	
	},
	ylimg: function (e) {
		var that = this;
		wx.previewImage({
			current: e.imgUrl[0],
			urls: e.imgUrl, // 需要预览的图片http链接列表
			success:function(){
				wx.switchTab({
					url: '/pages/index/index',
				})
				console.log("预览结束");
			}
		})
		
	},
	onLoad: function (options) {
		var lid = options.lid;//列表id
		var that = this;
		that.setData({
			lid: lid
		})
		app.getUserInfo(function (userInfo) {
			//更新数据
			that.setData({
				userInfo: userInfo
			})
			app.connect("reward_detail.php", { lid: lid }, function (e) {
				that.setData({
					data_list: e.data,
					lid: options.lid
				})
				console.log(e);
				//检查当前图集有没有呗当前用户打赏过，如果有，直接看图，跳过打赏
				app.connect("checkReward.php", {
					uid: app.globalData.userInfo.id,
					lid: lid
				}, function (ee) {
					//打赏成功情况下
					if (ee == "success") {
						/**
						wx.showToast({
							title: '打赏成功',
							icon: 'success',
							duration: 2000
						})
						 */
						that.ylimg(e.data);
					}
				});
			});
		})	
	},
	onShareAppMessage: function (options) {
		var that = this;
		return {
			title: that.data.data_list.nickName +"发布了一套“私房照”~赶紧点击查看！",
			path: '/pages/reward/index?lid=' + that.data.lid,
			imageUrl: 'http://uolol.com/img/zhuanfa.jpg'
		}
	}
})
